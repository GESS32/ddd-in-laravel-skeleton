# Domain-Driven Design (DDD)

---

1. [src/Domains](./Domain/README.md)
2. [src/Application](./Application/README.md)
3. [src/Infrastructure](./Infrastructure/README.md)

---

## 1. Core Principles of DDD

DDD is based on the following key concepts:

- **Domain**: The heart of the business logic. This layer contains entities, their attributes, and behavior.
- **Application**: A coordinating layer that manages processes and contains commands and handlers.
- **Infrastructure**: The implementation of interactions with external systems (such as databases) and the implementation of repository interfaces.

**DDD aims to make the domain layer independent of the framework**, enabling the reuse of business logic in other projects or migration to other platforms.

---

## 2. Project Structure

### General Structure

```
src/
├── Domain/                 # Domain models, repositories, and services
│   └── Product/             # Example domain "Product"
│       ├── Entities/        # Entities
│       ├── Repositories/    # Repository interfaces
│       └── Services/        # Domain-specific business logic
├── Application/             # Coordination of actions (commands, handlers)
│   └── Product/             # Example for "Product"
│       ├── Commands/        # Commands to work with the domain
│       └── Handlers/        # Command handlers
└── Infrastructure/          # Infrastructure layer
    └── Persistence/         # Repositories for working with the DB
```

### Example Structure of the "Product" Domain

```
src/
├── Domain/
│   └── Product/
│       ├── Entities/
│       │   └── Product.php
│       ├── Repositories/
│       │   └── ProductRepositoryInterface.php
│       └── Services/
│           └── ProductService.php
├── Application/
│   └── Product/
│       ├── Commands/
│       │   └── CreateProductCommand.php
│       └── Handlers/
│           └── CreateProductHandler.php
└── Infrastructure/
    └── Persistence/
        └── ProductRepositoryIlluminateDb.php
```

---

## 3. Implementation Details

### 3.1. Domain

The domain layer is responsible for the business logic.

Example of an entity:
```php
namespace Domain\Product\Entities;

class Product
{
    public function __construct(
        private string $id,
        private string $name,
        private float $price
    ) {}

    public function changePrice(float $newPrice): void
    {
        if ($newPrice <= 0) {
            throw new InvalidArgumentException('Price must be positive.');
        }

        $this->price = $newPrice;
    }

    // Any behavior...
}
```

Example of a repository interface:
```php
namespace Domain\Product\Repositories;

use Domain\Product\Entities\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product): void;

    public function findById(string $id): ?Product;
}
```

### 3.2. Application

The application layer is responsible for coordinating actions.

Example of a command:
```php
namespace Application\Product\Commands;

class CreateProductCommand
{
    public string $name;
    public float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}
```

Example of a command handler:
```php
namespace Application\Product\Handlers;

use Application\Product\Commands\CreateProductCommand;
use Domain\Product\Repositories\ProductRepositoryInterface;
use Domain\Product\Entities\Product;

class CreateProductHandler
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreateProductCommand $command): void
    {
        $product = new Product(uniqid(), $command->name, $command->price);
        $this->repository->save($product);
    }
}
```

#### Note: instantiating a domain entity directly in the application layer is generally not a best practice.
The example above is simplified and meant purely for illustration — there’s no complex business logic involved, so the direct creation of an entity may seem acceptable here.

However, in real projects, creating an entity usually involves more than just assigning properties. For example, you might need to:
* generate related value objects;
* trigger domain events;
* coordinate with other domain entities or services.

When that's the case, it's better to **move the creation logic into the domain layer**, using a **factory** or a **domain service** that can be called from the application layer.

### 3.3. Infrastructure

The infrastructure layer is responsible for interacting with external systems (e.g., DB).
Example of a repository:

```php
namespace Infrastructure\Persistence;

use Domain\Product\Repositories\ProductRepositoryInterface;
use Domain\Product\Entities\Product;
use Illuminate\Support\Facades\DB;

class ProductRepositoryIlluminateDb implements ProductRepositoryInterface
{
    public function save(Product $product): void
    {
        DB::table('products')->updateOrInsert(
            [
                'id' => $product->getId(),
            ],
            [
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ]
        );
    }

    public function findById(string $id): ?Product
    {
        $data = DB::table('products')->find($id);
        $product = null;

        if ($data) {
            $product = new Product($data->id, $data->name, $data->price);
        }

        return $product;
    }
}
```

#### Note: in the persistence layer (infrastructure), we may _reconstruct_ a domain entity based on data from a database or external services.
However, **we should not treat this as _creation_**, since entity creation may [involve business logic](#note-instantiating-a-domain-entity-directly-in-the-application-layer-is-generally-not-a-best-practice) — responsibilities that belong to the domain layer.

In the example above, we're reconstructing a simple entity.  
But if the entity had multiple fields represented by value objects, one possible approach to reduce [coupling](https://en.wikipedia.org/wiki/GRASP_(object-oriented_design)#Low_coupling) would be to change the repository interface to return a raw `array` instead of the entity itself.

A dedicated domain service could then take on the responsibility of reconstructing the entity from that `array`, explicitly depending on the repository and encapsulating the reconstruction logic within the domain layer.

---

## 6. Advantages of the DDD Approach
- Clear separation of responsibilities.
- Ease of testing.
- Better readability and maintainability of code.
- The ability to reuse the domain in other projects.

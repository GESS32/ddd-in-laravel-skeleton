# Laravel app

---

## 1. Presentation Layer

### Description

The **Presentation** layer is responsible for interacting with the user or external systems.

It includes the logic that transforms data from other layers (e.g., [**Application Layer**](../architecture/Application/readme.md) or [**Domain Layer**](../architecture/Domains/readme.md)) into a format suitable for presentation and interaction.

This layer is implemented through **Controllers** for web requests and **Console** for command-line operations.

This is the layer that provides the user interface and manages the data format for display, whether it's a web page, a JSON response, or command-line output.

### Role of Controllers and Console in the Presentation Layer
1.  **Controllers (for web applications)**:
    * Handle incoming HTTP requests from users.
    * Interact with the **Application Layer** to retrieve or modify data.
    * Format the response in a user-friendly way: can return an HTML page, JSON, or a redirect.
    * Can use **Resources**, **ViewModels**, or **DTOs** to pass data to the view.

2.  **Console (for command-line operations)**:
    * Handle commands executed through the console.
    * Interact with the **Application Layer** to perform operations (e.g., creating reports, processing queues).
    * Output information to the console, such as logs, execution statuses, or operation results.
    * Console commands can also accept arguments and parameters from the user and pass them to the **Application Layer**.

### Limitations

1.  **Does not contain**:

    * Business logic (logic should be in the **Domain Layer**).
    * Logic for coordination between different layers (this is the responsibility of the **Application Layer**).
    * Data access logic (this is the responsibility of the **Infrastructure Layer**).

2.  **Main purpose**:

    * Handling incoming requests (whether HTTP requests or console commands).
    * Formatting and presenting data in a user-friendly way (HTML, JSON, console output, etc.).
    * Passing data from the user to the **Application Layer** and providing the results in the required format.

---

## 2. Models

### Description

**Models in the context of Domain-Driven Design (DDD)** represent business objects that encapsulate logic, state, and behavior related to business rules.

**Laravel models** can be used in [infrastructure repositories](../architecture/Infrastructure/readme.md) for data manipulation, but it is important that [business logic remains in domains](../architecture/Domains/readme.md), and data access is abstracted through repositories.

In DDD, models should be isolated from infrastructure details such as **ORM** or **Data Mapper**.

Instead, Laravel Models should be used in repositories that provide interaction with external systems, databases, and other services.

### Role of Models in Repositories

1.  **Data access abstraction**:
    * Repositories are responsible for abstracting database or external system interactions. They use models to retrieve data and convert it into business objects.

2.  **Isolating business logic from infrastructure**:
    * Models remain independent of ORM or other infrastructure solutions. Repositories provide interaction between application layers and maintain the purity of business logic by allowing work with business objects in the infrastructure layer.

### Limitations

1. **Do not contain:**
    * Business logic that is not directly related to the model's data itself. For example, complex validation rules that involve other entities should reside in Domain Services.
    * Infrastructure concerns, such as database queries or specific ORM implementations. This logic should be handled by Repositories.
    * Presentation logic, such as formatting data for display or handling user input.

2. **Main purpose:**
    * Represent the structure and state of business entities.
    * Encapsulate basic validation rules related to the entity's data.
    * Serve as data transfer objects between layers, especially between the Repository and the Domain Layer.

---

## 3. Providers

### Description

**Providers** are the central place for registering all dependencies in the DI container that the application uses to function.

**Service Providers** will be used to register components of the [Application Layer](../architecture/Application/readme.md), [Infrastructure Layer](../architecture/Infrastructure/readme.md), and [Domains Layer](../architecture/Domains/readme.md), such as services, repositories, and other parts that interact with external systems or require implementation replacement in different environments.

This allows for centralized management of dependencies and their injection into the necessary classes.

### Role of Service Providers

1.  **Dependency registration**:
    * Each **Service Provider** is responsible for registering dependencies and their configuration in the dependency container. You can define which classes and interfaces should be injected into your controllers, services, and other components.

2.  **Service and component initialization**:
    * In a **Service Provider,** you can initialize services and components, such as connecting to external APIs, databases, or queues, configuring caching, logging, and other infrastructure components.

3.  **Configuration and setup**:
    * You can configure services or parameters passed to dependencies, including using configuration files. This allows for flexibility and configurability of your application.

### Limitations

1.  **Does not contain**:
    * Business operation logic or business logic in general (this is the task of the **Domain Layer**).
    * Logic for coordination between different application layers (this is the task of the **Application Layer**).
    * Logic for interaction with external systems (this is the task of the **Infrastructure Layer**).

2.  **Main purpose**:
    * Provide a centralized point for registering and configuring all dependencies in the application.
    * Initialize infrastructure components such as repositories, services, and other dependencies.
    * Ensure dependency injection into classes, ensuring loose coupling between application components.

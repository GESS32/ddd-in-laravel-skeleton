## Models

### Description

**Models in the context of Domain-Driven Design (DDD)** represent business objects that encapsulate logic, state, and behavior related to business rules.

**Laravel models** can be used for data manipulation, but it is important that [business logic remains in domains](../../../Domain/README.md), and data access is abstracted through repositories.

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

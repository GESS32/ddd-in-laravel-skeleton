# Domain Layer

---

## Description

The **Domain Layer** is the core of the application and contains all key business rules and logic.    
It defines entities, aggregates, domain services, repositories, and manages the state and business operations.

The **Domain Layer** is completely isolated from external technologies and frameworks, which makes it easy to test and reuse business logic.

- **Entities** — objects with a unique identifier and business logic.
- **Aggregates** — groups of entities that are treated as a single unit.
- **Services** — operations that do not belong to any particular entity but are important for the business logic.
- **Repositories** — interfaces for data access, without binding to a specific storage technology.
- **VO** (Value Objects) — immutable objects that represent a certain value but do not have a unique identifier.

---

## Limitations

1. **Does not contain**:
    - Logic for interacting with external systems (APIs, databases, queues, etc.).
    - Data presentation logic (ViewModels, DTOs, etc.).
    - Data access logic (repository implementation).

2. **Main goals**:
    - Implement business logic, isolated from external dependencies.
    - Operations related to managing the state and behavior of entities are performed within the domain.

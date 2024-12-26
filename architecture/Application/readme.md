# Application Layer

---

## Description

The **Application Layer** acts as a mediator and coordinates interaction between different domains and layers. Its main task is to coordinate the execution of business operations and provide interfaces for external interactions, such as user requests or external systems. The **Application Layer** does not contain business logic and is not responsible for the implementation details of data storage, views, or interactions with external systems.

- **Services** — coordinate calls to business logic and interaction between different domains.
- **Commands** and **Queries** — represent objects that transfer information between layers and trigger necessary actions in the domain layer.
- **Handlers** — objects that process commands and queries by invoking appropriate methods in the domain layer.
- **DTOs** (Data Transfer Objects) — objects used to transfer data between layers, often for APIs or other external interfaces.

---

## Role of Services

Application services should only be responsible for coordinating actions such as:

- Calling services from the **Domain Layer**.
- Transferring data between layers.
- Handling errors and performing transactions.

They should not contain logic directly related to business processes.

---

## Limitations

1. **Does not contain**:
    - Business logic (which should reside in the **Domain Layer**).
    - Data access logic (repository implementation or interaction with the data store).
    - Presentation logic (data formatting, creation of ViewModels, serialization for display).
    - Logic for interacting with external systems or services (e.g., working with APIs, external services, etc.).

2. **Main goals**:
    - Coordinate interactions between different domains and layers.
    - Process requests and transfer data between the view, business logic layers, and infrastructure.
    - Isolate business logic from external dependencies and interactions with external systems.

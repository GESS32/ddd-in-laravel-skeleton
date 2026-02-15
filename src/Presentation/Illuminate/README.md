# Presentation Layer

## Description

The **Presentation** layer is responsible for interacting with the user or external systems.

It includes the logic that transforms data from other layers (e.g., [**Application Layer**](../src/Application/README.md) or [**Domain Layer**](../src/Domain/README.md)) into a format suitable for presentation and interaction.

This layer is implemented through **Controllers** for web requests and **Console** for command-line operations.

This is the layer that provides the user interface and manages the data format for display, whether it's a web page, a JSON response, or command-line output.

## Role of Controllers and Console in the Presentation Layer
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

## Limitations

1.  **Does not contain**:

    * Business logic (logic should be in the **Domain Layer**).
    * Logic for coordination between different layers (this is the responsibility of the **Application Layer**).
    * Data access logic (this is the responsibility of the **Infrastructure Layer**).

2.  **Main purpose**:

    * Handling incoming requests (whether HTTP requests or console commands).
    * Formatting and presenting data in a user-friendly way (HTML, JSON, console output, etc.).
    * Passing data from the user to the **Application Layer** and providing the results in the required format.

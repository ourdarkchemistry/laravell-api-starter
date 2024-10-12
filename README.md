# Laravel API Starter

### Support Features

- RESTful HTTP response structure: unified response structure for success, failure, and exception scenarios; multilingual prompts
- Easier usage of enums/constants
- JWT-auth for authorization
- Reference for Repository & Service architectural design

### Directory Structure

```
├── app
│   ├── Console
│   │   ├── Commands                
│   │   └── Kernel.php              
│   ├── Contracts                    
│   ├── Enums                       
│   │   └── ResponseEnum.php
│   ├── Events                      
│   │   ├── Event.php
│   │   └── ExampleEvent.php
│   ├── Exceptions                   
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers            
│   │   │   ├── Controller.php
│   │   │   └── UsersController.php   
│   │   ├── Middleware
│   │   │   └── Authenticate.php     
│   │   └── Resources
│   │       └── UserResource.php      
│   ├── Jobs                       
│   │   ├── ExampleJob.php
│   │   └── Job.php
│   ├── Listeners                   
│   │   └── ExampleListener.php
│   ├── Models                     
│   │   └── User.php
│   ├── Providers                  
│   │   └── AppServiceProvider.php
│   ├── Services                     
│   └── Support                     
│       ├── Traits
│       │   ├── Helpers.php          
│       │   └── SerializeDate.php
│       └── helpers.php             
```

### Role Description

**Controller Responsibilities**:

1. Validate whether the request needs processing, if permissions are granted, and whether request parameters are valid. Invalid requests return a unified response format.
2. Pass validated parameters or Requests into the appropriate Service methods to implement specific business logic.
3. Controllers can use `__construct()` to inject multiple Services. For instance, the `UserController` may inject `UserService` (for user-related functionality) and `EmailService` (for email-related functionality).
4. Use the unified `$this->response` to call `success` or `fail` methods to return a unified data format.
5. Those using Laravel API Resource may also have data transformation logic in the Controller. For example, `return Response::success(new UserCollection($resource));` or `return Response::success(new UserResource($user));`.

**Service Responsibilities**:

1. Implement specific business functionality within the project. Thus, method names in Service should describe the functionality or business (verb + business description). For example, `handleListPageDisplay` and `handleProfilePageDisplay` correspond to user list display and user detail page display requirements.
2. Handle parameters passed from the Controller and make business judgments.
3. (Optional) Configure relevant Criteria and Presenters based on business needs (not needed can be skipped or generalized in the Repository).
4. Call the Repository to handle data logic.
5. Services can choose not to inject a Repository or only inject those with data relationships relevant to the current business. For instance, `EmailService` might only call a third-party API and not need to update system data, thus not requiring a Repository; `OrderService`, after implementing the order-outbound logic, may also need to generate corresponding financial documents, thus requiring injections of both `OrderRepository` and `FinancialDocumentRepository`, as the original order number in the financial document relates to the order number, creating a data relationship.
6. Services should not call other Services to maintain single responsibility; if needed, consider Controller calls.

**Model Responsibilities**:

The Model layer only requires simple data definitions, such as table definitions, field mappings, and relationships between tables.

### Specifications

* Naming Conventions:

- **Controllers**:
   - Class name: Noun, plural form, describing operations on the entire resource collection; when there is no collection concept, singular resource names can also be used—e.g., for a single overall configuration resource.
   - Method name: Verb + noun, reflecting resource operations, e.g., store/destroy.

- **Services**:
   - Class name: Noun, singular, e.g., `UserService`, `EmailService`, and `OrderService`.
   - Method name: `verb + noun`, describing business needs that can be achieved, e.g., `handleRegistration` for user registration functionality.

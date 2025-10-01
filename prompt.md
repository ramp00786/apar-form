# Note
*Note: Before you begin, clearly explain what you have understood. Then, ask me any questions you may have, and wait for my confirmation before proceeding.*  
*Note: Always wait for my confirmation before continuing.*  

## Important: You must follow these steps.
1. Create a `did.md` file and record all your actions in it. Each time before starting work, review both `did.md` and `application_tech.md` to understand what has been done so far. If `did.md` already exists, add your new actions to it instead of creating a new file. This file serves as a history of your work, helping you avoid duplicate tasks and ensuring that you continue building on previous progress.  

2. Whenever you add or update functionality, make sure to also update `application_tech.md.` This file will be used to create technical documentation for other developers so they can easily understand each functionality in the future when they need to scale or modify the application. You must maintain this file carefully and write it from a developer’s perspective. Also, include details of all functions, classes, where each function is called, function dependencies, class inheritance, and objects created for each class along with their usage locations.

3. Create a `todo.md` file where you list your todos before starting every task. Include a description of what you need to do and how you will do it. Once your todo is complete, update it by adding the flag `=> done`.  
When all todos are completed, clean the file. This file is helpful when I assign you a task and, in the middle, the internet disconnects or there is a power cut. With the help of this `todo.md` file, you will be able to continue from where you left off.  

## Prompt
```
# Laravel Application Setup Instructions

Create a **Laravel application** admin layout with modern UI, use tailwind css >  in this directory (first create a new subdirectory here).  
Use **MySQL** with the following configuration:

- **Database name:** `apar_app`  
- **Table prefix:** `apar_`  

---

## Design of the application look like admin panel with modern UI
## Landing page will be login page.

## User Roles

There will be two types of users:

1. **Reviewing Officer** (higher priority, acts as Admin)  
2. **Reporting Officer**  

No registration is required. Both users must be created using a **seeder** with the following credentials:

- **Reviewing Officer** → `reviewing.officer@tropmet.res.in` | Password: `Admin@123`  
- **Reporting Officer** → `reporting.officer@tropmet.res.in` | Password: `Iitm@123`  

Both users must have the ability to **change their password** after login.  

---

## Permissions

The file `word.html` should be used **only as a reference during development**.  
You must create your own **HTML file(s)** containing the same information and structure.  

Access rules are as follows:

- **Create file with the following fields**: 

1.	Name of the Employee :  

2.	Designation :  

3.	Employee ID :  

4.	Date of Birth : 

5.	Section or Group : 

6.	Area of Specialization : 

7.	Date of Joining to the Post :  

8.	E-mail ID :  

9.	Mobile No. :  

10.	Year Of the Report : 



- **Part 3 & Part 4** → Accessible to **both Reviewing Officer and Reporting Officer**  
- **Part 5** → Accessible to **Reviewing Officer only**  
- **Part B** → Accessible to **Reporting Officer only**  

---

## Functionality

- The **Reviewing Officer** can create a file with a given name.  
- When a user clicks on the file name, the **complete form** should be displayed with editable areas, depending on their role and permissions.  
- Ensure that the **Reporting Officer cannot view or modify inputs provided by the Reviewing Officer**.  

---





```

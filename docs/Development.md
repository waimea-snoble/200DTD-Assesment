# Development of a Database-Linked Website for NCEA Level 2

Project Name: **PROJECT NAME HERE**

Project Author: **YOUR NAME HERE**

Assessment Standards: **91892** and **91893**


-------------------------------------------------

## Design, Development and Testing Log

### 16/05/2024

Designing the database

Today I designed the first database draft 

![Database design](images/database-design.png)

### 20/05/2024

Creating UI flowchart

Today I made the first flowchart draft so I could see how the website would work
![UI flowchart](images/flowchart.png)

### 20/05/2024

Creating first figma design

Today I drafted the first figma UI design so I could see how my website would look, and also get feedback from my client.

![Figma UI design](images/figma-UI-design.png)

### 23/05/2024

I got feedback from my client and they said
>Instead of having the user input their surname and forename separately, it will be easier for them input at the same time. Add an option for the user to input their email because that is the way they will be contacted.

I responded to this feedback by removing the surname option and just having full name option. I also made sure the end-user can input their email as this will be the main form of contacting the end-user.
![Feedback for figma UI design](images/figma-feedback.png)  

Since my client wanted the end-user to input their full name and email, I needed to change the database design
![Database design v2](images/database-designv2.png)

Today I added an option for the admin to login, but I couldn't finish the delete task button. I also added the date next to the task. Accidentally clicked on the top task button, not meant to have blue outline.
![Figma UI design v2](images/figma-UI%20designv2.png)


### 27/05/2024

Today I am finishing the admin log in page.

I finished the admin login page, finishing the delete task button and adding an add task button. I also made it so the admin can click on a task to see the people doing that task, as well as their contact information.
![Figma UI design v3](images/figma-UI-designv3.png)

Today I have also changed the flowchart to show that the admin can view what people are doing the task.
![Flowchart v2](images/flowchartv2.png)


### 30/05/2024

I got feedback from my client and they said
>When the admin is deleting a task instead of having the task confirmation on a new page, just have it on the same page. This is because it looks less confusing when it is kept on the same page.

I responded to this feedback by doing what they said and making the it overlap the page.
![Figma UI design v4](images/figma-UI-designv4.png)



### 11/06/2024

I got more feedback from my client and they said
>It would be useful if there was a way to split the tasks into categories so it is easier for the admin to see the tasks that people have signed up for and what category it falls under. This will help if there are any gaps to target helpers in specific areas.

My client also said
>I felt that the login at the top of the page might be confusing for volunteers signing up for the tasks, as they might feel that they have to login.


I listened to my client and moved the login button to the bottom of the page and changed the name to admin login. I also made sure there was a category list to make it easier for the end-user to book a task that they want to do. I also made it so when the admin is adding a task they can choose a category that the task will go into.
![Figma UI design v5](images/figma-UI-designv5.png)


I changed the database so that a task can belong to a category.
![Database design v3](images/database-designv3.png)


### 13/06/2024

My client said
>The design looks great and it is easy to use. The buttons might look nicer if they were slightly rounded but I think that this will work extremely well with the gymnastics families signing up for tasks needing completed for the gymnastics competition. I am very happy with the result.


I was pleased that my client was happy with the design and decided to slightly round the buttons so they didn't look as rectangular. I decided to leave the boxes in the forms when the user is inputting text. 
![alt text](images/figma-UI-designv6.png)


# 14/06/2024

My client and I discussed about what colours to use for the design.
My client said
>I would like the colours of the website to incorporate the same colours as the Gymnastics Nelson logo which is blue, red and white. I feel that this would be important in retaining the Gymnastics Nelson identity.

We talked about where to put the colours and decided on this
![Figma UI design with colour](images/figma-UI-design-colour.png)

My client also said
>I loved the red buttons on some of the pages however there isn't red on every page, it might be nice to have a thin strip of red under the title.


I responded to my clients feedback by putting a thin strip of red under the title. My client id happy with the final result.
![Final figma UI design](images/final-figma-UI-design.png)



# 27/06/2024

I talked to my client before I started just to see if they had thought of any improvements that can be made to the website before I start the first draft and they said
>I think it will be a good idea to add a home button so the user wont have to click back multiple times to get back to the home page.

I finished the home page and task page and added a home button to lead back to the home page

![category list](images/category-list.png)

![Task list](images/task-list.png)



# 04/07/2024

I finished the task booking form so the user can select and sign up for a task.

![user details form](images/user-details-form.png)


# 22/07/2024

I added the option for the admin to login using a username and password.
![admin login button](images/category-listv2.png)
![admin login](images/admin-login.png)


# 25/07/2024

Today I finished the admin category and task list, the logout button, and the list of the people who have booked each task along with their contact information.
![Admin category list](images/admin-category-list.png)
![Admin task list](images/admin-task-list.png)
![User details](images/user-details.png)

# 30/07/2024

Today I added the options for the admin to delete a task from the database and add a task to the database.
![alt text](images/delete-task.png)

![add task](images/add-task.png)

# 05/08/2024

After adding the add task form I realised that it would be annoying for the admin to type out the category every time.
I solved this by having a dropdown menu with all of the existing tasks, and also having a new option which allows the admin to manually type a new category.


![add task v2](images/add-taskv2.png)

![category dropdown menu](images/category-selection.png)

![category dropdown menu new](images/category-selection-new.png)

# 08/08/2024
I realised that if a user is signing up for multiple tasks they wont want to fill out the form every time. I changed this by asking the user for only their email when they are signing up for a task. If they have previously signed up for a task they won't need to fill out the form, but if they have not signed for a task they will be asked to fill out their details in the form.

![ask for email](images/email-form.png)

![user details form](images/user-details-formv2.png)

# 11/08/2024
I showed this initial draft to my client and they said
>It works very nicely but I have just realised that there is no limited amount of tasks available. This means 100 people can book the same task which is a problem if there is only 5 people needed.

For this to work I needed to add an amount column to the database.
![database](images/database.png)


I listened to my client and added a limit to how many tasks can be booked
![limited number of tasks available](images/amount-remaining.png)

This means I also had to change the add task form so the admin can set an amount available for each task

![add task with amount](images/add-taskv3.png)




![not showing if amount = 0](images/amount=0-database.png)

I also made sure that a task will not be displayed if the amount remaining is 0. This is so a user cannot sign up for a task that is not needed anymore.

I showed my client how I had add a limited amount of tasks and how it didn't display if there was none remaining.
They were very pleased and said
>This looks really good and functions nicely, now all thats needed is the colouring.

# 19/08/2024
Today I finished the css for all of the pages in my website with the suggested colours by my client.

![css home page](images/css-home-page.png)

![css task list](images/css-task-list.png)

![css email form](images/css-email-form.png)

![css user details form](images/css-user-details-form.png)

![css admin login form](images/css-admin-login-form.png)

![css admin home page](images/css-admin-home-page.png)

![css admin task list](images/css-admin-task-list.png)

![css new task](images/css-new-task-1.png)

![css new task](images/css-new-task-2.png)

# 22/08/2024

Today I validated all of my code

These are the errors in my index page

![index code validation before](images/code-valadation-index.png)

I fixed all of the errors

![index code validation after](images/code-validation-after.png)

This is the error in my task list page

![task list code validation before](images/code-validation-task-list.png)

I fixed the error

![task list code validation after](images/code-validation-after.png)

these are the errors in my email form

![email form code validation before](images/code-validation-email-form.png)

I fixed all of the errors

![email form code validation after](images/code-validation-after.png)

these are the errors in my user details form

![user details form code validation before](images/code-validation-user-details-form.png)

I fixed all of the errors

![user details form code validation after](images/code-validation-after.png)

This is the error in my admin login form

![admin login form code validation before](images/code-validation-admin-login-form.png)

I fixed the error

![admin login form code validation after](images/code-validation-after.png)

These are the errors in my admin index page

![index admin code validation before](images/code-validation-index-admin.png)

I fixed all of the errors

![index admin code validation after](images/code-validation-after.png)

I did not have any errors on admin task list page

![admin task list code validation after](images/code-validation-after.png)

I did not have any errors on the admin people list page

![admin people list code validation after](images/code-validation-after.png)


These are errors in my add task form

![add task form code validation before](images/code-validation-add-task-form.png)

I fixed all of the errors

![add task form code validation after](images/code-validation-after.png)


# 24/08/24

[All functionality except admin login](https://mywaimeaschool-my.sharepoint.com/:v:/g/personal/snoble_waimea_school_nz/Eeq7PEgCbKRHrhkx6UIQlysBQhx56xow2gMhS6EPEPxRlA?nav=eyJyZWZlcnJhbEluZm8iOnsicmVmZXJyYWxBcHAiOiJTdHJlYW1XZWJBcHAiLCJyZWZlcnJhbFZpZXciOiJTaGFyZURpYWxvZy1MaW5rIiwicmVmZXJyYWxBcHBQbGF0Zm9ybSI6IldlYiIsInJlZmVycmFsTW9kZSI6InZpZXcifX0%3D&e=SRi07W)

The video link above shows a user signing up for a task, signing up for a task with their email already in the database, and signing up for a task they have already signed up for. It also shows that every time a user signs up for a task the amount required decreases by one until it disappears. It shows the admin logging in, deleting a task, adding a task, and viewing the  list of people who have booked the task.

[Admin Functionality](https://mywaimeaschool-my.sharepoint.com/:v:/g/personal/snoble_waimea_school_nz/Edp9WXE6F1ZFslIFoj6lF_YBP8Ba4XX520SlRvAgHAWPJg?nav=eyJyZWZlcnJhbEluZm8iOnsicmVmZXJyYWxBcHAiOiJTdHJlYW1XZWJBcHAiLCJyZWZlcnJhbFZpZXciOiJTaGFyZURpYWxvZy1MaW5rIiwicmVmZXJyYWxBcHBQbGF0Zm9ybSI6IldlYiIsInJlZmVycmFsTW9kZSI6InZpZXcifX0%3D&e=aHtETp)

I realised I forgot to show the admin login details in the database, and what happens if they input the wrong details so I included that in the video above.


# 25/08/2024

I showed the final website to my client and they said
>The Gymnastics Nelson Club colours of red white and blue were represented well in the website with just the right amount of each colour used. The website is easy to use and easy for the administrator to set up various tasks when needed. The website was efficient at gathering the contact details of each volunteer and was clear when the tasks allocation had been used up. The website was straight forward for users to sign up for a task. I appreciated that the website adapted to differing screen sizes and devices.
### Description

# AZUBI Form Submission Web Application v3
 
## Overview
 
The AZUBI Form Submission Web Application is a lightweight web-based tool designed to demonstrate the integration of HTML forms with PHP for server-side processing. This project showcases how to build and containerize a simple web application using Docker, and deploy it on Amazon ECS using AWS Fargate for scalable cloud hosting.
 
### Features
 
1. **User Input Collection**:
 
   - The web application includes a user-friendly form that collects essential details such as username and email.
   - The form is styled with CSS to provide a clean and modern interface.
 
2. **Server-Side Processing with PHP**:
 
   - Upon form submission, the data is sent to a PHP script (`form.php`) using the POST method.
   - The PHP script processes the inputs, providing a basic response to confirm receipt and displaying the submitted data.
 
3. **Dockerization**:
 
   - The entire application is containerized using Docker, encapsulating the web server and PHP environment within a single Docker image.
   - This approach simplifies deployment and ensures consistency across different environments.
 
4. **Deployment on AWS**:
   - The Docker image can be pushed to Amazon Elastic Container Registry (ECR), a fully managed Docker container registry that makes it easy to store, manage, and deploy Docker container images.
   - The application is deployed on Amazon Elastic Container Service (ECS) using AWS Fargate, a serverless compute engine for containers that allows running containers without managing servers.
   - Fargate handles the underlying infrastructure, providing seamless scalability and simplifying the deployment process.
 
### Steps to Build and Run Locally
 
1. **Build the Docker Image**:
 
   - Use the provided Dockerfile to build the image, which sets up an Apache server with PHP support.
   - The Docker build command packages the application and its dependencies into a Docker image.
 
   ```bash
   docker build -t php-web-app .
   ```
 
2. **Run the Docker Container**:
 
   - The Docker container can be run locally by mapping the container’s port 80 to your machine’s port 8080.
- This allows the application to be accessible at `http://localhost:8080`.
 
   ```bash
   docker run -d -p 8080:80 php-web-app
   ```
 
### Using terraform to provision DynamoDB
 
#### [Read Here](./terra/README.md) for more info.
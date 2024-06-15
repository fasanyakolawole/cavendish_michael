<h1>Introduction</h1>
<p>This document provides instructions for setting up and running a Laravel-based application developed as a test by Michael Fasanya.</p>

<h2>Prerequisites</h2>
<p>To run this application, ensure that your system meets the following requirements:</p>
<ul>
  <li>PHP version >= 8.2 installed</li>
  <li>Composer (for PHP dependency management)</li>
  <li>Docker (optional, if using Dockerized setup)</li>
</ul>

<h2>Setup Instructions</h2>

<ol>
  <li><strong>Clone the Repository</strong></li>
  <p>Clone the repository from GitHub:</p>
  <pre><code>git clone &lt;repository-url&gt;
cd &lt;repository-folder&gt;
  </code></pre>

  <li><strong>Install PHP Dependencies</strong></li>
  <p>Install PHP dependencies using Composer:</p>
  <pre><code>composer install
  </code></pre>

  <li><strong>Set Up Environment Variables</strong></li>
  <p>Copy the <code>.env.example</code> file to <code>.env</code> and configure it according to your environment:</p>
  <pre><code>cp .env.example .env
  </code></pre>

  <li><strong>Run Migrations and Seeders</strong></li>
  <p>Run Laravel migrations to set up the database schema:</p>
  <pre><code>php artisan migrate
  </code></pre>
  <p>Seed the database with sample data using Laravel Seeders:</p>
  <pre><code>php artisan db:seed
  </code></pre>

  <li><strong>Using Docker (Optional)</strong></li>
  <p>If you have Docker installed and prefer to use it, you can build and run the application with Docker:</p>
  <p><strong>Build Docker Container</strong><br>
  Build the Docker container using the included Dockerfile:</p>
  <pre><code>docker build -t my-laravel-app .
  </code></pre>
  <p><strong>Run Docker Container</strong><br>
  Run the Docker container:</p>
  <pre><code>docker run -p 8000:80 my-laravel-app
  </code></pre>
  <p>Access the application at <a href="http://localhost:8000">http://localhost:8000</a>.</p>

  <li><strong>Start Laravel Development Server</strong></li>
  <p>Alternatively, you can start the Laravel development server:</p>
  <pre><code>php artisan serve
  </code></pre>
  <p>Access the application at <a href="http://localhost:8000">http://localhost:8000</a>.</p>
</ol>

<h2>Testing</h2>
<p>To run tests, ensure your environment is set up correctly and execute PHPUnit:</p>
<pre><code>php artisan test
</code></pre>

<h2>Troubleshooting</h2>
<p>If you encounter any issues during setup or while running the application, please refer to the Laravel documentation or the repository's issue tracker on GitHub for assistance.</p>

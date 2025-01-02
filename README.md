# Velocity Forms

**Velocity Forms** is a component of the Mortgage Project, designed as a form handling system for Laravel 11 applications. Initially developed as a standalone package, it has been integrated into the Mortgage monorepo due to changes in strategy regarding package distribution.

## Project Context

This project was initially conceived to serve as a modular, reusable forms package for Laravel applications, drawing inspiration from WordPress's plugin ecosystem. However, following the trend set by Taylor Otwell and the Laravel community's shift towards monorepo structures for better dependency management and maintenance, we've decided to:

- **Move Velocity Forms into the Mortgage monorepo** for a more cohesive development and deployment experience.
- **Abandon the plan** to distribute this as a standalone package or develop a marketplace akin to WordPress plugins.

## Features

- **Dynamic Form Creation**: Easily create and manage forms through a UI or programmatically.
- **Form Validation**: Server-side validation with Laravel's validation system, with plans for enhanced client-side validation.
- **Custom Fields**: Support for various field types, including custom components.
- **Integration**: Seamless integration with Laravel's routing, views, and data handling mechanisms.

## Installation

Since Velocity Forms is now part of the Mortgage monorepo:

1. **Clone the Mortgage monorepo**:

   ```sh
   git clone [your-repo-url]
   cd mortgage-project
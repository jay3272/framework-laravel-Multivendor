# Contributing to Bagisto Multi-vendor

Thank you for considering contributing to the Bagisto Multi-vendor project! This document provides guidelines for contributing to the project.

## Code of Conduct

By participating in this project, you agree to maintain a respectful and inclusive environment for all contributors.

## How to Contribute

### Reporting Bugs

1. **Check existing issues** to see if the bug has already been reported
2. **Create a detailed bug report** including:
   - Clear, descriptive title
   - Steps to reproduce the issue
   - Expected behavior
   - Actual behavior
   - Screenshots (if applicable)
   - Environment details (PHP version, Laravel version, OS, etc.)

### Suggesting Enhancements

1. **Check existing issues** for similar suggestions
2. **Create a detailed enhancement proposal** including:
   - Clear description of the proposed feature
   - Use cases and benefits
   - Possible implementation approach

### Pull Requests

1. **Fork the repository** and create a new branch from `main`
2. **Follow coding standards**:
   - Follow PSR-12 coding standard
   - Use meaningful variable and function names
   - Add comments for complex logic
   - Write comprehensive docblocks

3. **Write tests** for new features
4. **Update documentation** as needed
5. **Commit messages**:
   - Use clear, descriptive commit messages
   - Follow conventional commits format when possible
   - Reference related issues

6. **Create a pull request** with:
   - Clear title and description
   - Reference to related issues
   - Screenshots for UI changes

## Development Workflow

### Setting Up Development Environment

1. Clone your fork:
```bash
git clone https://github.com/YOUR-USERNAME/framework-laravel-Multivendor.git
cd framework-laravel-Multivendor
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Set up environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations and seeders:
```bash
php artisan migrate --seed
```

### Code Style

We use Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

Before committing, ensure your code passes style checks.

### Running Tests

```bash
php artisan test
```

Ensure all tests pass before submitting a pull request.

### Branch Naming

- Feature: `feature/description`
- Bug fix: `fix/description`
- Documentation: `docs/description`

## Review Process

1. All pull requests require at least one approval
2. Maintainers may request changes
3. Once approved, a maintainer will merge your pull request

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

## Questions?

Feel free to open an issue for any questions about contributing!

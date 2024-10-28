
# Yaakov Bank

## Installation and Setup

1. Clone this repository.
2. Navigate to the project root with `cd front`.
3. Preferably use `yarn`; install it by following [this link](https://yarnpkg.com/getting-started/install).
4. Run `yarn` to install the dependencies.

## Configuration

Copy the structure of the example environment variables file:

```shell
cp .env.example .env
```

### Compile with Hot-Reload for Development

5. Run `yarn serve` to start the development server.

### Compile and Minify for Production

Run `yarn build`

### List and Fix Files

Run `yarn lint`

## Folder Structure

```
└── public
└── src
    ├── assets/        # items, images, and icons used in the application
    ├── components/    # shared components used throughout the application
    ├── router/        # route configuration
    ├── services/      # service configurations
    ├── store/         # Redux actions configuration and dispatch
    ├── styles/        # configuration variables
    ├── views/         # application pages
```

## Environment Variables:

```
VUE_APP_API_SERVER=http://127.0.0.1:8000/api
```

### Description of Variables:

- `VUE_APP_API_SERVER`: specify the backend URL

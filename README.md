## Introduction

Trailarr is a self hosted download manager for movie and tv show trailers.

## Features:

* A beautiful, easy to use UI.
* Easy setup, readily configured out-of-the box.

## Usage

To get started, all that is required is a `TMDB_API_KEY` which can be obtained for free from the TMDB [developer website.](https://developers.themoviedb.org/3/getting-started/introduction)

Docker compose example:

```yaml
version: '3'

services:
  trailarr:
    image: cgnetwork/trailarr:latest
    volumes:
      - /path/to/trailers:/var/www/html/storage/app/videos
    ports:
      - "80:80"
    environment:
      - TMDB_API_KEY=some-tmdb-api-key
```

## Configuration

A `TMDB_API_KEY` environment variable with a valid api key is required:

```bash
TMDB_API_KEY=some-tmdb-api-key
```

Trailers can be accessed on the host directory mounted to the container download directory:
```bash
/path/to/trailers:/var/www/html/storage/app/videos
```

## Contributing

Thank you for considering contributing to Trailarr! We welcome all pull requests.

## License

Trailarr is open-sourced software licensed under the [MIT license](https://github.com/cgnetwork/trailarr/blob/master/LICENSE).

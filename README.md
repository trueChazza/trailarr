<p align="center"><img width="150" src="docs/logo-alt.png" alt="trailarr logo"></p>

<p align="center">
    <a href="https://github.com/cgnetwork/trailarr/actions"><img src="https://img.shields.io/github/workflow/status/cgnetwork/trailarr/Master" alt="Build Status"></a>
  <a href="https://hub.docker.com/r/cgnetwork/trailarr"><img src="https://img.shields.io/docker/pulls/cgnetwork/trailarr" alt="Docker Pulls"></a>
    <a href="https://hub.docker.com/r/cgnetwork/trailarr/tags"><img src="https://img.shields.io/docker/v/cgnetwork/trailarr" alt="Version"></a>
    <a href="https://github.com/cgnetwork/trailarr/blob/master/LICENSE"><img src="https://img.shields.io/github/license/cgnetwork/trailarr" alt="License"></a>
</p>

<h2 align="center">trailarr</h2>

trailarr is an easy to use, self hosted manager for all your movie and tv show trailers. Easily search and download trailers with these great features:

* A beautiful, easy to use interface.
* Queued trailer downloads.
* Readily configured out-of-the box.
* Batteries included.

![Preview](docs/preview.png)

## Usage

Docker compose example:

```yaml
version: '3'

services:
  trailarr:
    container_name: trailarr
    image: cgnetwork/trailarr:latest
    ports:
      - "80:8080"
    volumes:
      - /path/to/trailers:/trailers
    restart: unless-stopped
```

## Configuration

Trailers can be accessed on the host directory mounted to the container download directory:
```bash
/path/to/trailers:/trailers
```

## Contributing

Thank you for considering contributing to trailarr! We welcome all pull requests.

## License

trailarr is open-sourced software licensed under the [MIT license](LICENSE).

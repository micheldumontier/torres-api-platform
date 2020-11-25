# TORRES : reposiTory Of faiR seRvErS

TORRES is a searchable repository of FAIR (Findable, Accessible, Interoperable, and Reusable) servers. It enables the capture of web services and the datasets they provide. The overall goal is to facilitate to discovery of servers that have content that are relevant to the user. Thus, TORRES is geared towards establishing a searchable index of the relations between data types and relationships, which is termed a GraphMap in the project. 

TORRES builds on [on the API Platform website](https://api-platform.com), and as such provides
* A hypermedia REST API with pagination, data validation, access control, relation embedding, filters and error handling...
* A GraphQL API
* Content Negotiation: [GraphQL](https://graphql.org), [JSON-LD](https://json-ld.org), [Hydra](https://hydra-cg.com),
  [HAL](https://github.com/mikekelly/hal_specification/blob/master/hal_specification.md), [JSONAPI](https://jsonapi.org/), [YAML](https://yaml.org/), [JSON](https://www.json.org/), [XML](https://www.w3.org/XML/) and [CSV](https://www.ietf.org/rfc/rfc4180.txt) are supported out of the box.
* Automatically generated API documentation that follows ([Swagger](https://swagger.io/)/[OpenAPI](https://www.openapis.org/)).
* [Docker](https://api-platform.com/docs/distribution) and [Kubernetes](https://api-platform.com/docs/deployment/kubernetes) deployable.
* Makes use of [Symfony](https://symfony.com) web application framework and [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html), while proressive client components leverage [React](https://reactjs.org/).


## Install

Rebuild and push the different Docker images:

```bash
./rebuild.sh
```

Restart the API platform in production:

```bash
./restart.sh
```

Access:

* CLIENT_HOST=torres.semanticscience.org
* API_HOST=api.torres.semanticscience.org
* Mercure: mercure.torres.semanticscience.org

Original images:

```bash
ADMIN_IMAGE=quay.io/api-platform/admin
NGINX_IMAGE=quay.io/api-platform/nginx
PHP_IMAGE=quay.io/api-platform/php
CLIENT_IMAGE=quay.io/api-platform/client
VARNISH_IMAGE=quay.io/api-platform/varnish
```

Environment variable not used:

```bash
NGINX_IMAGE=quay.io/api-platform/nginx
MERCURE_JWT_KEY=4121344212538417de3e2118
MERCURE_JWT_SECRET=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InN1YnNjcmliZSI6WyJmb28iLCJiYXIiXSwicHVibGlzaCI6WyJmb28iXX19.B0MuTRMPLrut4Nt3wxVvLtfWB_y189VEpWMlSmIQABQ
```

Developer components:

The API entities (Dataset, DataService, GraphMap) are fully defined in api/src/Entity/

Data examples are in api/data/






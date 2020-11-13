curl -X POST "https://localhost:8443/datasets" -H "accept: application/ld+json" -H "content-type: application/ld+json" -k -T "dataset.jsonld"
curl -X POST "https://localhost:8443/data_services" -H "accept: application/ld+json" -H "content-type: application/ld+json" -k -T "dataservice.jsonld"
curl.exe -X POST "https://localhost:8443/graphql" -k -H "Content-Type: application/json" -d "{\"query\": \"{ datasets { edges { node { title } } } } \"}"

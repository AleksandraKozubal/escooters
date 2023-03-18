## Escooters

### Last build
```
Build date: 2023-03-18 01:58:19

3 cities fetched for Roler.
9 cities fetched for Hulaj.
24 cities fetched for BITMobility.
199 cities fetched for Bolt.
27 cities fetched for Quick.
100 cities fetched for Voi.
49 cities fetched for Spin.
29 cities fetched for Neuron.
40 cities fetched for Helbiz.
18 cities fetched for Whoosh.
121 cities fetched for Bird.

495 cities fetched.
Cached cities loaded.
```

### Available providers

| No. | Provider     | Data source                                        |
|---|--------------|----------------------------------------------------|
| 1 | ~~Lime~~     | ~~webscrapped~~                                    |
| 2 | Bolt         | web API                                            |
| 3 | ~~Tier~~     | ~~web API~~                                        |
| 4 | Bird         | webscrapped with partially estimated countries     |
| 5 | Voi          | webscrapped                                        |
| 6 | Spin         | webscrapped                                        |
| 7 | ~~Link~~     | ~~webscrapped~~                                    |
| 8 | ~~Dott~~     | ~~webscrapped with partially estimated countries~~ |
| 9 | Quick        | webscrapped                                        |
| 10 | Neuron       | partially webscrapped                              |
| 11 | Whoosh       | hardcoded                                          |
| 12 | Helbiz       | hardcoded                                          |
| 13 | BIT Mobility | webscrapped                                        |
| 14 | Hulaj        | webscrapped                                        |
| 15 | Roler        | hardcoded                                          |

```
copy .env.example .env
docker-compose run --rm -u "$(id -u):$(id -g)" php composer install
docker-compose run --rm -u "$(id -u):$(id -g)" php php index.php
```

---
tags:
    - LB1
    - Konzept
hide:
    - toc
---

# Twig-Konzept

Um repetitive UI-Elemente zu Komponenten umzuwandeln wird eine [Template Engine](../Beschreibung/Twig.md) verwendet. Dafür eignet sich [Twig](https://twig.symfony.com/) sehr gut, da der [Syntax](../../PHP/Twig/Design.md) sehr einfach ist. Wie die Views aufgebaut sind wurde bereits im [MVC-Konzept](MVC-Konzept.md) beschrieben. Für das Stylen des Frontends wird [TailwindCSS](https://tailwindcss.com/) verwendet. Im folgendem Diagramm geht es um den Aufbau der Komponenten:

![UI Konzept](https://www.plantuml.com/plantuml/svg/hLV1Rjiu4BtxAuYSjga3B0hqOWH66xT9lRNRe4woPqeQowof8K5IThD5Vgkdtl9Z7KfoJ4csgtNgWs4CX_FUFCuCwJVMSUFoJBARjKZFFYhy3xJhEU4ai9FGTj9RY0GOPDhTimoo28pjsQL0pGtFM6fKhiUu02CSnnZOgs1HynIctAG2sQlNV_Twg1mmRjaOvwh7w7Dw-k5cEZcxa2fUdfwo9KTaZpyzHBmm0Y90jWQJ05RUrqPfC4w0zTwFFn398uBvuqyftSOLC64UgTVJF5uI1NPomIsSiEz5b5XoQzcK4wdpS_RNNNyc096_OCCX4vcMa04woqRAm3-pQe__dB6lVCLdiH7QiK6rNgm-176hRSt8WSSdlhhWfeszHNh9fC2bBLGXfAr45Tf3aDc4twlSsNfoFjroeOAPGYBoR2QvWmkPGu47tnmfLIaH95xn2nF7qZIerWAYiKAAudQn3FZCj1Hkd17Xpgo2509kbyfaDQ7ctZ0ex85LUAZVS1gLpFy0eJwZiamDM5lNxINJWNqGUjLzlaBiodN_wq1szQCVgKmhz3GQfvyxfyhYdcvI0dvb0B1LQ8xI8uIPCmBJmAvm94LHVPSvnaueR5Lw2NFb-ty_LY1LHIj4ZmgJ9PI9iEwyz1YspweuzYuOOzIvw--2cWkGoHDIuJSCbcqUPS8hKMvjKtXlZ3BTDCteZClwQycw4bP4qYz5IadWEu0AQfsIBIdLnWQFGEuvpWN7WbFjF2jMd8gztIxb8XGeWn8ji1lWYK9vlpkNJP4MsLXAnr1b4mC9DR7Ab6zy4UxDUDE0fJ3RlNNkZPGV6X3NzBLM9lazJ46cZdB6XBtRUNAxe6w_JBgXDFQzpxYGH-qSBI1UHkfRn-GQkz_HjBkcNWTpb3ZR8_21zghoZcxkHAtncHX5zvPdFMnWrRheLal5a_zVL5kaIo6X7JUSz9s6mIRSc6wR5C86efhYKYI7Pa5r8zm9M1yxOWzTBqhxGR1d_8OtpGUGzEngN3DlaqpWPpy1EWcHM_1ZvDO68knlh3h-DNqtqFy56QiCgejRcPXUgIqvdgxiKDHFobsg79EkM_tE-bqKYOJUcKT0VnGHHzvnOvy54eUlCVva7MmzsiKpKQauJBBvB6kc-WLIgWimpmf2PJUdLdfMZCyhCAjD4tHHBcoSKBgg6vvAFl0R1W-STWjU0OBXyY21-ejoJw2tMWFzD_B_b9uTY-PW7hlS_85Gv3GNrIEhKw3-4SL9vVc6fYxzw_m5 "UI Konzept"){loading=lazy width=100%}

## Ordnerstruktur

Die Ordnerstruktur ist wie folgt:

```text
app
├── Controller
├── Repository
├── Models
├── Core
├── Helpers
├── Views
│   ├── Base
│   │   ├── Main
│   │   ├── CoreJS
│   │   └── NavBar
│   ├── Layout
│   │   ├── BaseLayout
│   │   ├── SplitImageLayout
│   │   └── ContentLayout
│   ├── Components
│   │   ├── Button
│   │   ├── ButtonGroup
│   │   ├── Templates
│   │   │   └── ProjectView
│   │   ├── Form
│   │   ├── ProgressBar
│   │   ├── Upload
│   │   ├── Inputs
│   │   │   ├── Checkbox
│   │   │   ├── DatePicker
│   │   │   ├── Dropdown
│   │   │   ├── Password
│   │   │   ├── URL
│   │   │   └── Email
│   │   ├── Error
│   │   └── Input
│   ├── Helpers
│   │   └── AdminOnly
│   └── Pages
│       ├── Welcome
│       ├── NotFound
│       ├── Forbidden
│       ├── Kibana
│       ├── Login
│       ├── Register
│       ├── Profile
│       ├── Overview
│       ├── ProjectGeneral
│       ├── ProjectAppearance
│       ├── ProjectStructure
│       └── ProjectConfirm
└── Utils
```

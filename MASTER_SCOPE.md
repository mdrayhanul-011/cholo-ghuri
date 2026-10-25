# Cholo-Ghuri --- Master Scope Document

**Document type:** Permanent project requirements\
**Project folder:** `Cholo Ghuri`\
**Status:** Approved direction; technical blueprint and implementation
still require review phase by phase.

------------------------------------------------------------------------

## 1. Project Vision

**Cholo-Ghuri** is a bilingual, responsive, SEO-focused Bangladesh
travel and tourism platform. It should help people discover
destinations, understand travel options and estimated costs, read
practical guides, share real travel experiences, and plan trips with
assistance from AI.

The website should combine useful features and inspiration from [Unseen
Bangladesh](https://unseenbangladesh.com/) with the requirements in the
project proposal, while creating a consistent, accessible, easy-to-use
experience. Do not copy another website's design or content directly.

The goal is to build a useful, maintainable project and demonstrate real
progress. Search rankings cannot be guaranteed.

## 2. Brand and Language Requirements

-   **Brand name:** `Cholo-Ghuri`.
-   The brand name may appear in Banglish/Latin letters as `Cholo-Ghuri`
    and in Bengali script as `চলো-ঘুরি` where appropriate.
-   The site must support two language modes from the beginning:
    -   **English selector (`/en`):** user-facing text is Banglish
        written in Latin letters (for example, "Gontobbo ghure dekhen"
        rather than formal English).
    -   **Bangla selector (`/bn`):** user-facing text is written in
        Bengali script.
-   This language behavior is intentional: `/en` means the
    Banglish/Latin-script mode for this project, not conventional
    English copy.
-   Use the agreed URL structure, such as `/en/...` and `/bn/...`.
-   A language switch should take the visitor to the equivalent page in
    the other language when that equivalent exists. If it does not
    exist, use a sensible fallback without breaking navigation.
-   Navigation, buttons, form labels, validation messages, destination
    descriptions, SEO metadata, and other user-facing content should
    follow the selected language.
-   Avoid mixing the two scripts unnecessarily within one language mode,
    except for proper names, brand names, URLs, and technical terms
    where appropriate.
-   Implement the language system in a later approved phase; do not
    build it during a planning-only phase.

## 3. Main Goals

1.  Help visitors discover destinations and attractions across
    Bangladesh.
2.  Provide practical destination information, travel guides, transport
    options, and clearly labelled estimated costs.
3.  Allow travelers to contribute useful trip experiences, routes,
    expenses, tips, and visited places.
4.  Offer an AI-assisted trip planner grounded in verified or clearly
    labelled platform data.
5.  Give administrators tools to manage content, users, moderation, and
    SEO fields.
6.  Build a technically sound foundation for bilingual content,
    accessibility, performance, security, and search-engine
    discoverability.

## 4. Agreed Technology and Architecture

-   **Backend and web framework:** Laravel (PHP).
-   **Templates/UI:** Laravel Blade.
-   **CSS/UI toolkit:** Bootstrap, with custom CSS where needed.
-   **Client-side behavior:** JavaScript where necessary.
-   **Database:** MySQL.
-   **AI:** Google Gemini API, called securely from the server.
-   **Development environment:** VS Code / Antigravity; local
    environment may use XAMPP if suitable for the selected Laravel/PHP
    version.
-   **Version control:** Git for local checkpoints. **Never push to
    GitHub or upload the project anywhere unless the user explicitly
    approves.**
-   Prefer one Laravel application with server-rendered Blade pages. Do
    not create a separate React or Vue frontend unless the user
    explicitly approves a change to the architecture.
-   Follow standard Laravel conventions and use reusable layouts, Blade
    components, controllers, services, validation, middleware, policies,
    models, migrations, and seeders as appropriate.
-   Do not expose Gemini API keys or other secrets in browser code,
    public files, Git history, or screenshots.

## 5. Public Website Scope

Plan and implement these sections in an order agreed through phase
prompts:

1.  **Home:** brand introduction, destination discovery, popular places,
    categories, seasonal inspiration, guides, community experiences, and
    clear calls to action.
2.  **Destination discovery:** browse/search destinations and filter by
    location, category, season, activity, budget, and trip duration
    where data supports those filters.
3.  **Destination detail:** overview, gallery, attractions, best time to
    visit, practical tips, transport options, accommodation information,
    nearby destinations, FAQs, and estimated expenses.
4.  **Search results:** useful results, filters, and clear empty/error
    states.
5.  **Travel guides/articles:** listing pages and readable detail pages.
6.  **Community experiences:** browse experiences and view each
    experience's details.
7.  **Submit an experience:** submit visited places, route, transport,
    trip duration, costs, tips, and personal experience; submitted
    content may require moderation before publication.
8.  **Transport comparison:** compare available routes and transport
    modes when reliable data is available.
9.  **Budget calculator:** estimate a trip budget with transport,
    accommodation, food, local transport, entry/activity costs, and an
    optional contingency. Show per-person and group estimates where
    relevant.
10. **AI travel planner:** collect user preferences and propose an
    itinerary based on platform destination information and available
    travel data.
11. **Authentication and user area:** sign in/register as appropriate;
    manage profile, saved destinations/guides/itineraries, and submitted
    experiences.
12. **Informational pages:** About, Contact/Feedback, Privacy, Terms,
    community guidelines, and relevant travel-data disclaimers.

The exact first-release priorities and page sequence should be
documented in `PROJECT_BLUEPRINT.md` and confirmed before
implementation. Do not add unrequested features just because they seem
common on travel websites.

## 6. Admin Panel Scope

Provide a separate, protected admin area with role-based authorization.
Planned management areas:

-   Dashboard and content overview.
-   Destinations, destination categories, attractions, and media.
-   Transport routes and fares.
-   Accommodation and expense estimates.
-   Travel guides/articles and their translations.
-   User-submitted experiences and moderation status.
-   Users and roles/permissions.
-   SEO titles, meta descriptions, slugs, canonical settings where
    appropriate, and indexing-related content settings.
-   Gemini/AI configuration that does not reveal secrets to unauthorized
    users.
-   Source references and last-verified dates for changing travel
    information.

Only authorized users may access admin actions. Hiding an admin link in
the interface is not sufficient security; server-side authorization is
required.

## 7. Data Quality and Travel Price Rules

-   Clearly distinguish **estimated/reference prices** from **confirmed,
    current, or live prices**.
-   Never invent transport fares, accommodation rates, opening hours,
    entry fees, or availability.
-   Where a price is shown, store or display its source/reference and
    last-verified date when available.
-   Prefer official or authorized APIs, feeds, and partner integrations
    for transport data.
-   Before scraping any website, check its terms, robots/access rules,
    and whether the intended collection is permitted. Do not bypass
    access controls or anti-bot measures.
-   If live data is unavailable, the platform may show clearly labelled
    reference estimates with their source and verification date, or
    explain that the price needs confirmation.
-   The budget calculator must use available data and show that results
    are estimates, not guaranteed quotations.
-   Community-submitted costs should be labelled as traveler-reported
    and may be moderated or checked.

## 8. AI Planner Rules

-   Call Gemini from Laravel's server side; keep API credentials secret.
-   Ground itinerary suggestions in the platform's destination records
    and available transport/cost information.
-   Do not let the model fabricate prices, route availability, opening
    hours, or booking confirmations.
-   Clearly label estimates and identify when information is missing or
    requires verification.
-   Validate user input, handle API errors and rate limits, and avoid
    sending unnecessary personal information to the AI provider.
-   Explain that generated itineraries are suggestions and that users
    should verify time-sensitive details before traveling.

## 9. SEO, Accessibility, and Performance

SEO is a core requirement, not a last-minute decoration.

-   Use meaningful page titles, meta descriptions, readable slugs,
    headings, internal links, and useful page content.
-   Support language-specific metadata and appropriate
    canonical/hreflang relationships for equivalent Banglish and Bangla
    pages.
-   Plan XML sitemap, `robots.txt`, structured data/Schema.org where
    appropriate, mobile usability, image optimization, and performance
    checks.
-   Avoid thin, duplicated, automatically generated, or misleading pages
    created solely to target keywords.
-   Make pages responsive and accessible: semantic HTML, keyboard
    usability, visible focus, adequate contrast, descriptive image
    alternatives, and clear form errors.
-   Measure technical and search performance using suitable tools such
    as Google Search Console and Google Analytics when configured.
-   Never promise first place, guaranteed traffic, or a specific search
    ranking.

## 10. Core Logical Data Areas

These are planning-level entities, not a finalized schema. Confirm
relationships and fields in `PROJECT_BLUEPRINT.md` before migrations are
created.

-   Users, roles, and permissions.
-   Destinations and destination translations.
-   Destination categories, attractions, and media.
-   Transport routes, transport modes, fares, sources, and verification
    dates.
-   Accommodation information and expense estimates.
-   Guides/articles and their translations.
-   Travel experiences, submission status, and moderation records.
-   Saved destinations, guides, and itineraries.
-   AI-generated itinerary records if persistence is approved.
-   SEO metadata and localized slugs where needed.

Keep sample data contracts consistent with the future database model.
Clearly label placeholder/sample data and do not present it as verified
real-world information.

## 11. Proposed Bilingual URL Pattern

Examples (final route definitions belong in the technical blueprint):

-   `/en` and `/bn`
-   `/en/destinations` and `/bn/destinations`
-   `/en/destinations/coxs-bazar` and `/bn/destinations/coxs-bazar`
-   `/en/guides` and `/bn/guides`
-   `/en/experiences` and `/bn/experiences`
-   `/en/ai-planner` and `/bn/ai-planner`

`/en` is the project's Banglish-in-Latin-script mode. `/bn` is the
Bengali-script mode. These labels should be implemented consistently
across routes, templates, content, and metadata.

## 12. Delivery and Collaboration Rules

-   Work in clearly defined phases with one focused Antigravity prompt
    at a time.
-   Before changing files, inspect the existing workspace and report
    important findings.
-   After each phase, summarize what was created/changed, how it was
    tested, known issues, and what approval is needed.
-   Do not move to the next phase until the user has reviewed the result
    and approved it.
-   Prefer small, reversible changes and preserve existing work. Do not
    delete or overwrite files without explaining why and obtaining
    approval when the change could be destructive.
-   Keep implementation beginner-friendly and explain important
    decisions in concise language.
-   Do not install packages, create migrations, implement APIs, or build
    pages during a planning-only phase.
-   Do not push to GitHub, publish/deploy, upload files to external
    services, or incur paid API usage without explicit approval.
-   Do not assume a Laravel project is already initialized. Inspect the
    folder first and recommend setup if needed; do not initialize or
    overwrite the workspace without approval.
-   Keep `MASTER_SCOPE.md` as the permanent requirements reference.
    Record approved technical decisions and phase plans in
    `PROJECT_BLUEPRINT.md`. If a requirement changes, update the
    documents only after the user confirms the change.

## 13. Required Phase 00 Output

Phase 00 is planning only. It should create or propose
`PROJECT_BLUEPRINT.md` containing:

1.  Architecture overview and rationale.
2.  Recommended Laravel directory structure.
3.  Public, user, and admin route groups.
4.  Banglish/Bangla localization and URL strategy.
5.  Reusable Blade layouts/components.
6.  Sample data contracts for destinations, transport/fare,
    accommodation/expenses, guides, experiences, and itineraries.
7.  Logical database entities and relationships (no migrations yet).
8.  SEO, accessibility, security, authorization, media, validation, and
    Gemini integration plans.
9.  Implementation phases, dependencies, and which parts initially use
    sample data versus database/API data.
10. Risks, assumptions, decisions requiring approval, and an acceptance
    checklist.

After creating the blueprint, Antigravity must summarize its findings
and stop. Wait for the user to review and approve before Phase 01.

## 14. Definition of Success

The project should progressively deliver a working, maintainable,
bilingual travel platform whose design, data, and functionality remain
consistent. Each phase must be reviewable and testable. The first
milestone is a clear, approved blueprint and visible incremental
progress---not an unreviewed, all-at-once implementation.

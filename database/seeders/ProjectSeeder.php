<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        $projects = [
            [
                'title' => 'Cashier App ("Gosir")',
                'tagline' => 'A point-of-sale mobile transaction client built on Flutter.',
                'tags' => ['Flutter', 'Dart', 'SQL', 'Mobile POS'],
                'description' => 'A point-of-sale mobile transaction client built on Flutter, integrating encrypted local caches with dynamic relational SQL database logging structures. Features a barcode scanner simulation, custom receipt exports, inventory metrics, and transaction history logs.',
                'external_url' => 'https://github.com/Valdric',
                'media' => ['/images/gosir.jpg'],
                'order' => 1,
            ],
            [
                'title' => 'Soul Extractor / Spectral',
                'tagline' => 'A narrative survival horror concept using Unity 2D.',
                'tags' => ['Unity 2D', 'C#', 'Aseprite', 'Game Dev'],
                'description' => 'A narrative survival horror game concept built in Unity 2D. Integrates custom C# raycasting vision fields, procedural ambient audio triggers, and dark atmospheric environments with custom sprite sheets designed frame-by-frame in Aseprite.',
                'external_url' => 'https://github.com/Valdric',
                'media' => ['/images/soul_extractor.png'],
                'order' => 2,
            ],
            [
                'title' => 'Ooga Booga Attack',
                'tagline' => 'An action survival game built for Global Game Jam 2026.',
                'tags' => ['Unity 2D', 'C#', 'Game Jam', 'Action'],
                'description' => 'An action survival game built for the Global Game Jam 2026. Control a tribal defender fighting off waves of incoming ancient creatures and wild bosses. Built within 48 hours using Unity and custom C# physics velocity components.',
                'external_url' => 'https://globalgamejam.org/games/2026/ooga-booga-attack-4',
                'media' => ['/images/ooga_booga.png'],
                'order' => 3,
            ],
            [
                'title' => 'Her Fallacy',
                'tagline' => 'A narrative 2D survival horror game built in Unity.',
                'tags' => ['Unity 2D', 'C#', 'Aseprite'],
                'description' => 'A dark, atmospheric story-driven survival horror game where you explore a haunted forest populated by strange creatures. Features custom field-of-view raycasting, procedural inventory slots, ambient sound mixers, and custom animations drawn frame-by-frame in Aseprite.',
                'external_url' => 'https://vulcanova-team.itch.io/her-fallacy',
                'media' => ['/images/her_fallacy.png'],
                'order' => 4,
            ],
            [
                'title' => 'Slider',
                'tagline' => 'A vibrant space shooter action game with retro styling.',
                'tags' => ['Unity 2D', 'C#', 'Game Design'],
                'description' => 'An intense retro-inspired bullet-hell shooter game set in deep space. Control a highly maneuverable starship to fight off alien swarm invaders and giant bosses. Integrated with vector velocity movement, custom projectile pools, and particle explosion fields.',
                'external_url' => 'https://ritssss.itch.io/slider',
                'media' => ['/images/slider.jpg'],
                'order' => 5,
            ],
            [
                'title' => 'RoadToUnpas',
                'tagline' => 'An educational campus guide and visual exploration game.',
                'tags' => ['Unity / Godot', 'Visual Novel', 'Education'],
                'description' => 'An interactive campus simulator game designed to guide new university students through the landmarks, departments, and academic procedures of Universitas Pasundan. Features detailed dialog trees, character profiles, quest systems, and map tracking hubs.',
                'external_url' => 'https://xinsooval.itch.io/roadtounpas',
                'media' => ['/images/roadtounpas.png'],
                'order' => 6,
            ],
            [
                'title' => 'Intro Buddy',
                'tagline' => 'An interactive learning helper game for children.',
                'tags' => ['Mobile / Web', 'Educational', 'UX Design'],
                'description' => 'A colorful, interactive learning companion app designed to assist children in developing spelling, arithmetic, and spatial puzzles. Built with high-fidelity asset animations, audio guides, and drag-and-drop drag interfaces.',
                'external_url' => 'https://drive.google.com/file/d/1POhiEGRmkLEpbC-SuMvMwek9q0Ps08WZ/view?usp=drive_link',
                'media' => ['/images/introbuddy.png'],
                'order' => 7,
            ],
            [
                'title' => 'Personal Web Portfolio v1',
                'tagline' => 'An interactive web developer portfolio concept showcasing green accents.',
                'tags' => ['HTML5', 'CSS3', 'JS', 'Web Dev'],
                'description' => 'A minimalist personal portfolio website built with clean grid interfaces, dark theme elements, and custom CSS page-scroll triggers.',
                'external_url' => 'https://valdric.github.io/itw2023_project1_233040163/',
                'media' => ['/images/portfolio_v1.png'],
                'order' => 8,
            ],
            [
                'title' => 'KA24 Food Landing Page',
                'tagline' => 'A modern culinary branding landing page showcasing signature menus.',
                'tags' => ['HTML5', 'CSS3', 'JS', 'Culinary UI'],
                'description' => 'An interactive food order landing page styled in high contrast colors, carrying dynamic search inputs, menu panels, and reservation metrics.',
                'external_url' => 'https://valdric.github.io/itw2023_project2_233040163/',
                'media' => ['/images/ka24_food.png'],
                'order' => 9,
            ],
            [
                'title' => 'KasiDuit',
                'tagline' => 'A secure, transparent crowdfunding and donation platform.',
                'tags' => ['Laravel', 'PHP', 'Tailwind CSS', 'Crowdfunding'],
                'description' => 'A secure and transparent web-based crowdfunding and donation platform designed to coordinate social campaigns and process public contributions. Features campaign management systems, donor tracking dashboards, and transparent financial reporting tools.',
                'external_url' => 'https://kasiduit.my.id/',
                'media' => ['/images/kasiduit.png'],
                'order' => 10,
            ],
            [
                'title' => 'Gameseed',
                'tagline' => 'An action/simulation game built for the Gameseed 2026 Game Jam.',
                'tags' => ['Unity 2D', 'C#', 'Game Jam', 'Action'],
                'description' => 'An action/simulation game built for the Gameseed 2026 Game Jam competition. Designed around resource management, planting seeds, and ecological restoration. Features C# velocity mechanics, dynamic grid environments, and classic retro arcade UI elements.',
                'external_url' => 'https://youtu.be/yJB7bejT50E',
                'media' => ['/images/gameseed.png'],
                'order' => 11,
            ]
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(
                ['title' => $projectData['title']],
                $projectData
            );
        }
    }
}

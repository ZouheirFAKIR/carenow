<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Medecin;
use App\Models\Avis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAndAvisSeeder extends Seeder
{
    public function run(): void
    {
        $medecinIds = Medecin::pluck('id')->toArray();

        if (empty($medecinIds)) {
            $this->command->error('Veuillez ajouter des médecins avant d\'exécuter ce seeder.');
            return;
        }

        // Une grande variété d'avis différents
        $comments = [
            'Très satisfait de la consultation. Le médecin a pris le temps de tout m\'expliquer.',
            'Accueil chaleureux et très professionnel. Je recommande vivement !',
            'Rendez-vous à l\'heure, pas d\'attente inutile. Très bonne expérience.',
            'Un spécialiste à l\'écoute et très bienveillant.',
            'Consultation efficace, diagnostic rapide et explications claires.',
            'Cabinet très propre et personnel accueillant.',
            'Service impeccable du début à la fin. Merci CareNow !',
            'Soins de qualité. Je reviendrai sans hésiter.',
            'Rien à redire, tout s\'est très bien passé.',
            'Le médecin est très compétent et rassurant.',
            'Excellente prise en charge. Prise de rendez-vous très simple sur le site.',
            'Docteur à l\'écoute de ses patients. Bonnes explications.',
            'Ponctuel, professionnel et très humain.',
            'Très bonne expérience globale pour ma première consultation.',
            'Suivi médical au top, très satisfait de mon passage.',
            'Médecin très doux avec les enfants, mon fils n\'a même pas eu peur !',
            'Cabinet très moderne et équipement de pointe.',
            'Diagnostic très précis, le traitement a fonctionné rapidement.',
            'Je recommande ce médecin pour son professionnalisme.',
            'Très bon accueil du secrétariat et soin de qualité.'
        ];

        $firstNames = ['Karim', 'Youssef', 'Amina', 'Sara', 'Mehdi', 'Sonia', 'Omar', 'Khadija', 'Hassan', 'Fatima', 'Reda', 'Nadia', 'Tarik', 'Leila', 'Zakaria', 'Asmaa', 'Hamza', 'Meryem', 'Badr', 'Houda', 'Ali', 'Zineb', 'Anass', 'Salma'];
        $lastNames = ['Bennani', 'Alaoui', 'Idrissi', 'El Amrani', 'Tazi', 'Chraibi', 'Naciri', 'Berrada', 'El Fassi', 'Kabbaj', 'Mansouri', 'Filali', 'Kadiri', 'Sefrioui', 'Benchekroun', 'Guessous', 'Zahrani', 'Cherkaoui', 'Lahlou', 'Tahiri'];

        $this->command->info('Génération des 100 comptes avec mots de passe uniques en cours...');

        for ($i = 1; $i <= 100; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $name = $firstName . ' ' . $lastName;
            $email = strtolower($firstName . '.' . $lastName . $i . '@example.com');

            // Mot de passe unique généré aléatoirement pour chaque compte (ex: CarePass9481!)
            $plainPassword = 'Pass' . rand(1000, 9999) . '!';

            // 1. Création de l'utilisateur avec son propre mot de passe haché
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'role' => 'client',
                'password' => Hash::make($plainPassword),
                'email_verified_at' => now(),
            ]);

            // 2. Sélection d'une note (entre 3 et 5) et commentaire varié
            $note = rand(3, 5);
            $commentaire = $comments[array_rand($comments)];

            // On ajoute parfois un détail personnalisé dans le commentaire pour le rendre unique
            if ($i % 2 === 0) {
                $commentaire .= ' (Consulté en ' . date('Y') . ')';
            }

            // 3. Création de l'avis unique
            Avis::create([
                'user_id' => $user->id,
                'medecin_id' => $medecinIds[array_rand($medecinIds)],
                'note' => $note,
                'commentaire' => $commentaire,
            ]);
        }

        $this->command->info('100 comptes uniques et 100 avis ont été créés avec succès !');
    }
}
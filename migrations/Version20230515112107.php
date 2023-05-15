<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515112107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enseignant_matiere (enseignant_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_33D1A024E455FCC0 (enseignant_id), INDEX IDX_33D1A024F46CD258 (matiere_id), PRIMARY KEY(enseignant_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_enseignant DROP FOREIGN KEY FK_536FA40FE455FCC0');
        $this->addSql('ALTER TABLE matiere_enseignant DROP FOREIGN KEY FK_536FA40FF46CD258');
        $this->addSql('DROP TABLE matiere_enseignant');
        $this->addSql('ALTER TABLE administratif ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD cin INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_145F75AAE7927C74 ON administratif (email)');
        $this->addSql('ALTER TABLE enseignant ADD specialite VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, DROP nom, DROP prenom');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E38F5EA509');
        $this->addSql('DROP INDEX IDX_717E22E38F5EA509 ON etudiant');
        $this->addSql('ALTER TABLE etudiant ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, CHANGE classe_id cin INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_717E22E3E7927C74 ON etudiant (email)');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD cin INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere_enseignant (matiere_id INT NOT NULL, enseignant_id INT NOT NULL, INDEX IDX_536FA40FE455FCC0 (enseignant_id), INDEX IDX_536FA40FF46CD258 (matiere_id), PRIMARY KEY(matiere_id, enseignant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE matiere_enseignant ADD CONSTRAINT FK_536FA40FE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_enseignant ADD CONSTRAINT FK_536FA40FF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024E455FCC0');
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024F46CD258');
        $this->addSql('DROP TABLE enseignant_matiere');
        $this->addSql('DROP INDEX UNIQ_145F75AAE7927C74 ON administratif');
        $this->addSql('ALTER TABLE administratif DROP email, DROP roles, DROP password, DROP cin');
        $this->addSql('DROP INDEX UNIQ_717E22E3E7927C74 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP email, DROP roles, DROP password, DROP departement, CHANGE cin classe_id INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E38F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_717E22E38F5EA509 ON etudiant (classe_id)');
        $this->addSql('ALTER TABLE enseignant ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, DROP specialite, DROP departement');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP email, DROP roles, DROP password, DROP cin');
    }
}

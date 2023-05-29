<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230529080408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP INDEX UNIQ_DF7DFD0E58C54515, ADD INDEX IDX_DF7DFD0E58C54515 (horaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP INDEX IDX_DF7DFD0E58C54515, ADD UNIQUE INDEX UNIQ_DF7DFD0E58C54515 (horaire_id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230527095336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_matiere DROP FOREIGN KEY FK_C8194940A76ED395');
        $this->addSql('ALTER TABLE user_matiere DROP FOREIGN KEY FK_C8194940F46CD258');
        $this->addSql('DROP TABLE user_matiere');
        $this->addSql('ALTER TABLE matiere ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9014574AA76ED395 ON matiere (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_matiere (user_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_C8194940F46CD258 (matiere_id), INDEX IDX_C8194940A76ED395 (user_id), PRIMARY KEY(user_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_matiere ADD CONSTRAINT FK_C8194940A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_matiere ADD CONSTRAINT FK_C8194940F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574AA76ED395');
        $this->addSql('DROP INDEX IDX_9014574AA76ED395 ON matiere');
        $this->addSql('ALTER TABLE matiere DROP user_id');
    }
}

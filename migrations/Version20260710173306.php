<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260710173306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal ADD intensite INT NOT NULL');
        $this->addSql('ALTER TABLE journal ADD CONSTRAINT FK_C1A7E74D12B83D77 FOREIGN KEY (symptome_id) REFERENCES symptome (id)');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prise_medicament ADD CONSTRAINT FK_9A13DBE4AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal DROP FOREIGN KEY FK_C1A7E74D12B83D77');
        $this->addSql('ALTER TABLE journal DROP intensite');
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723AA76ED395');
        $this->addSql('ALTER TABLE prise_medicament DROP FOREIGN KEY FK_9A13DBE4AB0D61F7');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AA76ED395');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A12469DE2');
    }
}

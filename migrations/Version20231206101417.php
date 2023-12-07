<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206101417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE possession DROP FOREIGN KEY FK_F9EE3F429D86650F');
        $this->addSql('ALTER TABLE possession ADD CONSTRAINT FK_F9EE3F429D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE possession DROP FOREIGN KEY FK_F9EE3F429D86650F');
        $this->addSql('ALTER TABLE possession ADD CONSTRAINT FK_F9EE3F429D86650F FOREIGN KEY (user_id_id) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}

<?php

namespace Lokalise;

use Lokalise\Endpoints\Branches;
use Lokalise\Endpoints\Comments;
use Lokalise\Endpoints\Contributors;
use Lokalise\Endpoints\CustomTranslationStatuses;
use Lokalise\Endpoints\Files;
use Lokalise\Endpoints\Keys;
use Lokalise\Endpoints\Languages;
use Lokalise\Endpoints\Orders;
use Lokalise\Endpoints\PaymentCards;
use Lokalise\Endpoints\Projects;
use Lokalise\Endpoints\QueuedProcesses;
use Lokalise\Endpoints\Screenshots;
use Lokalise\Endpoints\Snapshots;
use Lokalise\Endpoints\Tasks;
use Lokalise\Endpoints\Teams;
use Lokalise\Endpoints\TeamUserGroups;
use Lokalise\Endpoints\TeamUsers;
use Lokalise\Endpoints\TranslationProviders;
use Lokalise\Endpoints\Translations;
use Lokalise\Endpoints\Webhooks;

class LokaliseApiClient
{
    public const VERSION = '4.2.0';

    public const ENDPOINT = 'https://api.lokalise.com/api2/';

    public Comments $comments;

    public Contributors $contributors;

    public Files $files;

    public Keys $keys;

    public Languages $languages;

    public Projects $projects;

    public QueuedProcesses $queuedProcesses;

    public Screenshots $screenshots;

    public Snapshots $snapshots;

    public Tasks $tasks;

    public Teams $teams;

    public TeamUsers $teamUsers;

    public Translations $translations;

    public TeamUserGroups $teamUserGroups;

    public TranslationProviders $translationProviders;

    public PaymentCards $paymentCards;

    public Orders $orders;

    public CustomTranslationStatuses $customTranslationStatuses;

    public Webhooks $webhooks;

    public Branches $branches;

    /**
     * LokaliseApiClient constructor.
     *
     * @param string $apiToken
     */
    public function __construct(string $apiToken)
    {
        $this->comments = new Comments(self::ENDPOINT, $apiToken);
        $this->contributors = new Contributors(self::ENDPOINT, $apiToken);
        $this->customTranslationStatuses = new CustomTranslationStatuses(self::ENDPOINT, $apiToken);
        $this->files = new Files(self::ENDPOINT, $apiToken);
        $this->keys = new Keys(self::ENDPOINT, $apiToken);
        $this->languages = new Languages(self::ENDPOINT, $apiToken);
        $this->orders = new Orders(self::ENDPOINT, $apiToken);
        $this->paymentCards = new PaymentCards(self::ENDPOINT, $apiToken);
        $this->projects = new Projects(self::ENDPOINT, $apiToken);
        $this->queuedProcesses = new QueuedProcesses(self::ENDPOINT, $apiToken);
        $this->screenshots = new Screenshots(self::ENDPOINT, $apiToken);
        $this->snapshots = new Snapshots(self::ENDPOINT, $apiToken);
        $this->tasks = new Tasks(self::ENDPOINT, $apiToken);
        $this->teams = new Teams(self::ENDPOINT, $apiToken);
        $this->teamUsers = new TeamUsers(self::ENDPOINT, $apiToken);
        $this->translations = new Translations(self::ENDPOINT, $apiToken);
        $this->teamUserGroups = new TeamUserGroups(self::ENDPOINT, $apiToken);
        $this->translationProviders = new TranslationProviders(self::ENDPOINT, $apiToken);
        $this->webhooks = new Webhooks(self::ENDPOINT, $apiToken);
        $this->branches = new Branches(self::ENDPOINT, $apiToken);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return self::VERSION;
    }
}

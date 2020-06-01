<?php

namespace Lokalise;

use Lokalise\Endpoints\CustomTranslationStatuses;
use Lokalise\Endpoints\PaymentCards;
use \Lokalise\Endpoints\Comments;
use \Lokalise\Endpoints\Contributors;
use \Lokalise\Endpoints\Files;
use \Lokalise\Endpoints\Keys;
use \Lokalise\Endpoints\Languages;
use Lokalise\Endpoints\Orders;
use \Lokalise\Endpoints\Projects;
use Lokalise\Endpoints\QueuedProcesses;
use Lokalise\Endpoints\TranslationProviders;
use \Lokalise\Endpoints\Screenshots;
use \Lokalise\Endpoints\Snapshots;
use \Lokalise\Endpoints\Tasks;
use \Lokalise\Endpoints\Teams;
use Lokalise\Endpoints\TeamUserGroups;
use \Lokalise\Endpoints\TeamUsers;
use \Lokalise\Endpoints\Translations;
use Lokalise\Endpoints\Webhooks;

class LokaliseApiClient
{
    const VERSION = '3.0.0';

    const ENDPOINT = 'https://api.lokalise.com/api2/';

    /** @var Comments */
    public $comments;

    /** @var Contributors */
    public $contributors;

    /** @var Files */
    public $files;

    /** @var Keys */
    public $keys;

    /** @var Languages */
    public $languages;

    /** @var Projects */
    public $projects;

    /** @var QueuedProcesses */
    public $queuedProcesses;

    /** @var Screenshots */
    public $screenshots;

    /** @var Snapshots */
    public $snapshots;

    /** @var Tasks */
    public $tasks;

    /** @var Teams */
    public $teams;

    /** @var TeamUsers */
    public $teamUsers;

    /** @var Translations */
    public $translations;

    /** @var TeamUserGroups */
    public $teamUserGroups;

    /** @var TranslationProviders */
    public $translationProviders;

    /** @var PaymentCards */
    public $paymentCards;

    /** @var Orders */
    public $orders;

    /** @var CustomTranslationStatuses */
    public $customTranslationStatuses;

    /** @var Webhooks */
    public $webhooks;

    /**
     * LokaliseApiClient constructor.
     *
     * @param string $apiToken
     */
    public function __construct($apiToken)
    {
        $this->comments = new Comments(self::ENDPOINT, $apiToken);
        $this->contributors = new Contributors(self::ENDPOINT, $apiToken);
        $this->files = new Files(self::ENDPOINT, $apiToken);
        $this->keys = new Keys(self::ENDPOINT, $apiToken);
        $this->webhooks = new Webhooks(self::ENDPOINT, $apiToken);
        $this->languages = new Languages(self::ENDPOINT, $apiToken);
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
        $this->paymentCards = new PaymentCards(self::ENDPOINT, $apiToken);
        $this->orders = new Orders(self::ENDPOINT, $apiToken);
        $this->customTranslationStatuses = new CustomTranslationStatuses(self::ENDPOINT, $apiToken);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}

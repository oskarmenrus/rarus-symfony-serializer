<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Example\CustomTypes\UnixMilliseconds\UnixMillisecond;
use Symfony\Component\Serializer\Annotation;

class Company
{
    #[Annotation\Ignore]
    private ?int $id;

    #[Annotation\SerializedName('value')]
    private string $name;

    private Address $address;

    private ?string $kpp;

    private ?Capital $capital;

    private ?Management $management;

    /** @var null|Founder[] $founders */
    private Collection $founders;

    /** @var null|Manager[] $managers */
    private Collection $managers;

    #[Annotation\SerializedName('branch_type')]
    private ?string $branchType;

    #[Annotation\SerializedName('branch_count')]
    private ?int $branchCount;

    private string $type;

    private State $state;

    private Opf $opf;

    private string $inn;

    private string $ogrn;

    private ?string $okpo;

    private ?string $okato;

    private ?string $oktmo;

    private ?string $okogu;

    private ?string $okfs;

    private ?string $okved;

    /** @var null|Okved[] $okveds */
    private Collection $okveds;

    private ?Finance $finance;

    /** @var null|Phone[] $phones */
    private Collection $phones;

    /** @var null|Email[] $emails */
    private Collection $emails;

    #[Annotation\SerializedName('ogrn_date')]
    private UnixMillisecond $ogrnDate;

    #[Annotation\SerializedName('okved_type')]
    private ?string $okvedType;

    #[Annotation\SerializedName('employee_count')]
    private ?int $employeeCnt;

    public function __construct(
        string $name,
        ?string $kpp,
        ?Capital $capital,
        ?Management $management,
        ?array $founders,
        ?string $branchType,
        ?int $branchCount,
        string $type,
        State $state,
        Opf $opf,
        string $inn,
        string $ogrn,
        ?string $okpo,
        ?string $okato,
        ?string $oktmo,
        ?string $okogu,
        ?string $okfs,
        ?string $okved,
        ?Finance $finance,
        ?array $okveds,
        ?array $emails,
        UnixMillisecond $ogrnDate,
        ?string $okvedType,
        ?int $employeeCnt,
    ) {
        $this->name = $name;
        $this->kpp = $kpp;
        $this->capital = $capital;
        $this->management = $management;
        $this->branchType = $branchType;
        $this->branchCount = $branchCount;
        $this->type = $type;
        $this->state = $state;
        $this->opf = $opf;
        $this->inn = $inn;
        $this->ogrn = $ogrn;
        $this->okpo = $okpo;
        $this->okato = $okato;
        $this->oktmo = $oktmo;
        $this->okogu = $okogu;
        $this->okfs = $okfs;
        $this->okved = $okved;
        $this->finance = $finance;
        $this->ogrnDate = $ogrnDate;
        $this->okvedType = $okvedType;
        $this->employeeCnt = $employeeCnt;

        $this->managers = new ArrayCollection();
        $this->phones = new ArrayCollection();

        $this->founders = new ArrayCollection($founders ?: []);
        $this->okveds = new ArrayCollection($okveds ?: []);
        $this->emails = new ArrayCollection($emails ?: []);
    }

    public function getManagers(): Collection
    {
        return $this->managers;
    }

    public function addManager(Manager $manager): void
    {
        if (!$this->managers->contains($manager)) {
            $manager->setCompany($this);
            $this->managers->add($manager);
        }
    }

    public function removeManager(Manager $manager): void
    {
        if ($this->managers->contains($manager)) {
            $this->managers->removeElement($manager);
        }
    }

    public function getOkveds(): Collection
    {
        return $this->okveds;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function attachPhone(Phone $phone): void
    {
        if (!$this->phones->contains($phone)) {
            $phone->setCompany($this);
            $this->phones->add($phone);
        }
    }

    public function detachPhone(Phone $phone): void
    {
        if ($this->phones->contains($phone)) {
            $this->phones->removeElement($phone);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    public function getCapital(): ?Capital
    {
        return $this->capital;
    }

    public function getManagement(): ?Management
    {
        return $this->management;
    }

    public function getFounders(): Collection
    {
        return $this->founders;
    }

    public function getBranchType(): ?string
    {
        return $this->branchType;
    }

    public function getBranchCount(): ?int
    {
        return $this->branchCount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function getOpf(): Opf
    {
        return $this->opf;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    public function getOkato(): ?string
    {
        return $this->okato;
    }

    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    public function getOkogu(): ?string
    {
        return $this->okogu;
    }

    public function getOkfs(): ?string
    {
        return $this->okfs;
    }

    public function getOkved(): ?string
    {
        return $this->okved;
    }

    public function getFinance(): ?Finance
    {
        return $this->finance;
    }

    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function getOgrnDate(): UnixMillisecond
    {
        return $this->ogrnDate;
    }

    public function getOkvedType(): ?string
    {
        return $this->okvedType;
    }

    public function getEmployeeCnt(): ?int
    {
        return $this->employeeCnt;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}

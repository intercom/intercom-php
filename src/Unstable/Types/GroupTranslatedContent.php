<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Translated Content of an Group. The keys are the locale codes and the values are the translated content of the Group.
 */
class GroupTranslatedContent extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object - group_translated_content.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?GroupContent $ar The content of the group in Arabic
     */
    #[JsonProperty('ar')]
    private ?GroupContent $ar;

    /**
     * @var ?GroupContent $bg The content of the group in Bulgarian
     */
    #[JsonProperty('bg')]
    private ?GroupContent $bg;

    /**
     * @var ?GroupContent $bs The content of the group in Bosnian
     */
    #[JsonProperty('bs')]
    private ?GroupContent $bs;

    /**
     * @var ?GroupContent $ca The content of the group in Catalan
     */
    #[JsonProperty('ca')]
    private ?GroupContent $ca;

    /**
     * @var ?GroupContent $cs The content of the group in Czech
     */
    #[JsonProperty('cs')]
    private ?GroupContent $cs;

    /**
     * @var ?GroupContent $da The content of the group in Danish
     */
    #[JsonProperty('da')]
    private ?GroupContent $da;

    /**
     * @var ?GroupContent $de The content of the group in German
     */
    #[JsonProperty('de')]
    private ?GroupContent $de;

    /**
     * @var ?GroupContent $el The content of the group in Greek
     */
    #[JsonProperty('el')]
    private ?GroupContent $el;

    /**
     * @var ?GroupContent $en The content of the group in English
     */
    #[JsonProperty('en')]
    private ?GroupContent $en;

    /**
     * @var ?GroupContent $es The content of the group in Spanish
     */
    #[JsonProperty('es')]
    private ?GroupContent $es;

    /**
     * @var ?GroupContent $et The content of the group in Estonian
     */
    #[JsonProperty('et')]
    private ?GroupContent $et;

    /**
     * @var ?GroupContent $fi The content of the group in Finnish
     */
    #[JsonProperty('fi')]
    private ?GroupContent $fi;

    /**
     * @var ?GroupContent $fr The content of the group in French
     */
    #[JsonProperty('fr')]
    private ?GroupContent $fr;

    /**
     * @var ?GroupContent $he The content of the group in Hebrew
     */
    #[JsonProperty('he')]
    private ?GroupContent $he;

    /**
     * @var ?GroupContent $hr The content of the group in Croatian
     */
    #[JsonProperty('hr')]
    private ?GroupContent $hr;

    /**
     * @var ?GroupContent $hu The content of the group in Hungarian
     */
    #[JsonProperty('hu')]
    private ?GroupContent $hu;

    /**
     * @var ?GroupContent $id The content of the group in Indonesian
     */
    #[JsonProperty('id')]
    private ?GroupContent $id;

    /**
     * @var ?GroupContent $it The content of the group in Italian
     */
    #[JsonProperty('it')]
    private ?GroupContent $it;

    /**
     * @var ?GroupContent $ja The content of the group in Japanese
     */
    #[JsonProperty('ja')]
    private ?GroupContent $ja;

    /**
     * @var ?GroupContent $ko The content of the group in Korean
     */
    #[JsonProperty('ko')]
    private ?GroupContent $ko;

    /**
     * @var ?GroupContent $lt The content of the group in Lithuanian
     */
    #[JsonProperty('lt')]
    private ?GroupContent $lt;

    /**
     * @var ?GroupContent $lv The content of the group in Latvian
     */
    #[JsonProperty('lv')]
    private ?GroupContent $lv;

    /**
     * @var ?GroupContent $mn The content of the group in Mongolian
     */
    #[JsonProperty('mn')]
    private ?GroupContent $mn;

    /**
     * @var ?GroupContent $nb The content of the group in Norwegian
     */
    #[JsonProperty('nb')]
    private ?GroupContent $nb;

    /**
     * @var ?GroupContent $nl The content of the group in Dutch
     */
    #[JsonProperty('nl')]
    private ?GroupContent $nl;

    /**
     * @var ?GroupContent $pl The content of the group in Polish
     */
    #[JsonProperty('pl')]
    private ?GroupContent $pl;

    /**
     * @var ?GroupContent $pt The content of the group in Portuguese (Portugal)
     */
    #[JsonProperty('pt')]
    private ?GroupContent $pt;

    /**
     * @var ?GroupContent $ro The content of the group in Romanian
     */
    #[JsonProperty('ro')]
    private ?GroupContent $ro;

    /**
     * @var ?GroupContent $ru The content of the group in Russian
     */
    #[JsonProperty('ru')]
    private ?GroupContent $ru;

    /**
     * @var ?GroupContent $sl The content of the group in Slovenian
     */
    #[JsonProperty('sl')]
    private ?GroupContent $sl;

    /**
     * @var ?GroupContent $sr The content of the group in Serbian
     */
    #[JsonProperty('sr')]
    private ?GroupContent $sr;

    /**
     * @var ?GroupContent $sv The content of the group in Swedish
     */
    #[JsonProperty('sv')]
    private ?GroupContent $sv;

    /**
     * @var ?GroupContent $tr The content of the group in Turkish
     */
    #[JsonProperty('tr')]
    private ?GroupContent $tr;

    /**
     * @var ?GroupContent $vi The content of the group in Vietnamese
     */
    #[JsonProperty('vi')]
    private ?GroupContent $vi;

    /**
     * @var ?GroupContent $ptBr The content of the group in Portuguese (Brazil)
     */
    #[JsonProperty('pt-BR')]
    private ?GroupContent $ptBr;

    /**
     * @var ?GroupContent $zhCn The content of the group in Chinese (China)
     */
    #[JsonProperty('zh-CN')]
    private ?GroupContent $zhCn;

    /**
     * @var ?GroupContent $zhTw The content of the group in Chinese (Taiwan)
     */
    #[JsonProperty('zh-TW')]
    private ?GroupContent $zhTw;

    /**
     * @param array{
     *   type?: ?string,
     *   ar?: ?GroupContent,
     *   bg?: ?GroupContent,
     *   bs?: ?GroupContent,
     *   ca?: ?GroupContent,
     *   cs?: ?GroupContent,
     *   da?: ?GroupContent,
     *   de?: ?GroupContent,
     *   el?: ?GroupContent,
     *   en?: ?GroupContent,
     *   es?: ?GroupContent,
     *   et?: ?GroupContent,
     *   fi?: ?GroupContent,
     *   fr?: ?GroupContent,
     *   he?: ?GroupContent,
     *   hr?: ?GroupContent,
     *   hu?: ?GroupContent,
     *   id?: ?GroupContent,
     *   it?: ?GroupContent,
     *   ja?: ?GroupContent,
     *   ko?: ?GroupContent,
     *   lt?: ?GroupContent,
     *   lv?: ?GroupContent,
     *   mn?: ?GroupContent,
     *   nb?: ?GroupContent,
     *   nl?: ?GroupContent,
     *   pl?: ?GroupContent,
     *   pt?: ?GroupContent,
     *   ro?: ?GroupContent,
     *   ru?: ?GroupContent,
     *   sl?: ?GroupContent,
     *   sr?: ?GroupContent,
     *   sv?: ?GroupContent,
     *   tr?: ?GroupContent,
     *   vi?: ?GroupContent,
     *   ptBr?: ?GroupContent,
     *   zhCn?: ?GroupContent,
     *   zhTw?: ?GroupContent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->ar = $values['ar'] ?? null;
        $this->bg = $values['bg'] ?? null;
        $this->bs = $values['bs'] ?? null;
        $this->ca = $values['ca'] ?? null;
        $this->cs = $values['cs'] ?? null;
        $this->da = $values['da'] ?? null;
        $this->de = $values['de'] ?? null;
        $this->el = $values['el'] ?? null;
        $this->en = $values['en'] ?? null;
        $this->es = $values['es'] ?? null;
        $this->et = $values['et'] ?? null;
        $this->fi = $values['fi'] ?? null;
        $this->fr = $values['fr'] ?? null;
        $this->he = $values['he'] ?? null;
        $this->hr = $values['hr'] ?? null;
        $this->hu = $values['hu'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->it = $values['it'] ?? null;
        $this->ja = $values['ja'] ?? null;
        $this->ko = $values['ko'] ?? null;
        $this->lt = $values['lt'] ?? null;
        $this->lv = $values['lv'] ?? null;
        $this->mn = $values['mn'] ?? null;
        $this->nb = $values['nb'] ?? null;
        $this->nl = $values['nl'] ?? null;
        $this->pl = $values['pl'] ?? null;
        $this->pt = $values['pt'] ?? null;
        $this->ro = $values['ro'] ?? null;
        $this->ru = $values['ru'] ?? null;
        $this->sl = $values['sl'] ?? null;
        $this->sr = $values['sr'] ?? null;
        $this->sv = $values['sv'] ?? null;
        $this->tr = $values['tr'] ?? null;
        $this->vi = $values['vi'] ?? null;
        $this->ptBr = $values['ptBr'] ?? null;
        $this->zhCn = $values['zhCn'] ?? null;
        $this->zhTw = $values['zhTw'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getAr(): ?GroupContent
    {
        return $this->ar;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setAr(?GroupContent $value = null): self
    {
        $this->ar = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getBg(): ?GroupContent
    {
        return $this->bg;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setBg(?GroupContent $value = null): self
    {
        $this->bg = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getBs(): ?GroupContent
    {
        return $this->bs;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setBs(?GroupContent $value = null): self
    {
        $this->bs = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getCa(): ?GroupContent
    {
        return $this->ca;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setCa(?GroupContent $value = null): self
    {
        $this->ca = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getCs(): ?GroupContent
    {
        return $this->cs;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setCs(?GroupContent $value = null): self
    {
        $this->cs = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getDa(): ?GroupContent
    {
        return $this->da;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setDa(?GroupContent $value = null): self
    {
        $this->da = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getDe(): ?GroupContent
    {
        return $this->de;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setDe(?GroupContent $value = null): self
    {
        $this->de = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getEl(): ?GroupContent
    {
        return $this->el;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setEl(?GroupContent $value = null): self
    {
        $this->el = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getEn(): ?GroupContent
    {
        return $this->en;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setEn(?GroupContent $value = null): self
    {
        $this->en = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getEs(): ?GroupContent
    {
        return $this->es;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setEs(?GroupContent $value = null): self
    {
        $this->es = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getEt(): ?GroupContent
    {
        return $this->et;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setEt(?GroupContent $value = null): self
    {
        $this->et = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getFi(): ?GroupContent
    {
        return $this->fi;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setFi(?GroupContent $value = null): self
    {
        $this->fi = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getFr(): ?GroupContent
    {
        return $this->fr;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setFr(?GroupContent $value = null): self
    {
        $this->fr = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getHe(): ?GroupContent
    {
        return $this->he;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setHe(?GroupContent $value = null): self
    {
        $this->he = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getHr(): ?GroupContent
    {
        return $this->hr;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setHr(?GroupContent $value = null): self
    {
        $this->hr = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getHu(): ?GroupContent
    {
        return $this->hu;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setHu(?GroupContent $value = null): self
    {
        $this->hu = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getId(): ?GroupContent
    {
        return $this->id;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setId(?GroupContent $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getIt(): ?GroupContent
    {
        return $this->it;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setIt(?GroupContent $value = null): self
    {
        $this->it = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getJa(): ?GroupContent
    {
        return $this->ja;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setJa(?GroupContent $value = null): self
    {
        $this->ja = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getKo(): ?GroupContent
    {
        return $this->ko;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setKo(?GroupContent $value = null): self
    {
        $this->ko = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getLt(): ?GroupContent
    {
        return $this->lt;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setLt(?GroupContent $value = null): self
    {
        $this->lt = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getLv(): ?GroupContent
    {
        return $this->lv;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setLv(?GroupContent $value = null): self
    {
        $this->lv = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getMn(): ?GroupContent
    {
        return $this->mn;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setMn(?GroupContent $value = null): self
    {
        $this->mn = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getNb(): ?GroupContent
    {
        return $this->nb;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setNb(?GroupContent $value = null): self
    {
        $this->nb = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getNl(): ?GroupContent
    {
        return $this->nl;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setNl(?GroupContent $value = null): self
    {
        $this->nl = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getPl(): ?GroupContent
    {
        return $this->pl;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setPl(?GroupContent $value = null): self
    {
        $this->pl = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getPt(): ?GroupContent
    {
        return $this->pt;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setPt(?GroupContent $value = null): self
    {
        $this->pt = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getRo(): ?GroupContent
    {
        return $this->ro;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setRo(?GroupContent $value = null): self
    {
        $this->ro = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getRu(): ?GroupContent
    {
        return $this->ru;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setRu(?GroupContent $value = null): self
    {
        $this->ru = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getSl(): ?GroupContent
    {
        return $this->sl;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setSl(?GroupContent $value = null): self
    {
        $this->sl = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getSr(): ?GroupContent
    {
        return $this->sr;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setSr(?GroupContent $value = null): self
    {
        $this->sr = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getSv(): ?GroupContent
    {
        return $this->sv;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setSv(?GroupContent $value = null): self
    {
        $this->sv = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getTr(): ?GroupContent
    {
        return $this->tr;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setTr(?GroupContent $value = null): self
    {
        $this->tr = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getVi(): ?GroupContent
    {
        return $this->vi;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setVi(?GroupContent $value = null): self
    {
        $this->vi = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getPtBr(): ?GroupContent
    {
        return $this->ptBr;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setPtBr(?GroupContent $value = null): self
    {
        $this->ptBr = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getZhCn(): ?GroupContent
    {
        return $this->zhCn;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setZhCn(?GroupContent $value = null): self
    {
        $this->zhCn = $value;
        return $this;
    }

    /**
     * @return ?GroupContent
     */
    public function getZhTw(): ?GroupContent
    {
        return $this->zhTw;
    }

    /**
     * @param ?GroupContent $value
     */
    public function setZhTw(?GroupContent $value = null): self
    {
        $this->zhTw = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

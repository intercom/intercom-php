<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Translated Content of an Article. The keys are the locale codes and the values are the translated content of the article.
 */
class ArticleTranslatedContent extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object - article_translated_content.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?ArticleContent $ar The content of the article in Arabic
     */
    #[JsonProperty('ar')]
    private ?ArticleContent $ar;

    /**
     * @var ?ArticleContent $bg The content of the article in Bulgarian
     */
    #[JsonProperty('bg')]
    private ?ArticleContent $bg;

    /**
     * @var ?ArticleContent $bs The content of the article in Bosnian
     */
    #[JsonProperty('bs')]
    private ?ArticleContent $bs;

    /**
     * @var ?ArticleContent $ca The content of the article in Catalan
     */
    #[JsonProperty('ca')]
    private ?ArticleContent $ca;

    /**
     * @var ?ArticleContent $cs The content of the article in Czech
     */
    #[JsonProperty('cs')]
    private ?ArticleContent $cs;

    /**
     * @var ?ArticleContent $da The content of the article in Danish
     */
    #[JsonProperty('da')]
    private ?ArticleContent $da;

    /**
     * @var ?ArticleContent $de The content of the article in German
     */
    #[JsonProperty('de')]
    private ?ArticleContent $de;

    /**
     * @var ?ArticleContent $el The content of the article in Greek
     */
    #[JsonProperty('el')]
    private ?ArticleContent $el;

    /**
     * @var ?ArticleContent $en The content of the article in English
     */
    #[JsonProperty('en')]
    private ?ArticleContent $en;

    /**
     * @var ?ArticleContent $es The content of the article in Spanish
     */
    #[JsonProperty('es')]
    private ?ArticleContent $es;

    /**
     * @var ?ArticleContent $et The content of the article in Estonian
     */
    #[JsonProperty('et')]
    private ?ArticleContent $et;

    /**
     * @var ?ArticleContent $fi The content of the article in Finnish
     */
    #[JsonProperty('fi')]
    private ?ArticleContent $fi;

    /**
     * @var ?ArticleContent $fr The content of the article in French
     */
    #[JsonProperty('fr')]
    private ?ArticleContent $fr;

    /**
     * @var ?ArticleContent $he The content of the article in Hebrew
     */
    #[JsonProperty('he')]
    private ?ArticleContent $he;

    /**
     * @var ?ArticleContent $hr The content of the article in Croatian
     */
    #[JsonProperty('hr')]
    private ?ArticleContent $hr;

    /**
     * @var ?ArticleContent $hu The content of the article in Hungarian
     */
    #[JsonProperty('hu')]
    private ?ArticleContent $hu;

    /**
     * @var ?ArticleContent $id The content of the article in Indonesian
     */
    #[JsonProperty('id')]
    private ?ArticleContent $id;

    /**
     * @var ?ArticleContent $it The content of the article in Italian
     */
    #[JsonProperty('it')]
    private ?ArticleContent $it;

    /**
     * @var ?ArticleContent $ja The content of the article in Japanese
     */
    #[JsonProperty('ja')]
    private ?ArticleContent $ja;

    /**
     * @var ?ArticleContent $ko The content of the article in Korean
     */
    #[JsonProperty('ko')]
    private ?ArticleContent $ko;

    /**
     * @var ?ArticleContent $lt The content of the article in Lithuanian
     */
    #[JsonProperty('lt')]
    private ?ArticleContent $lt;

    /**
     * @var ?ArticleContent $lv The content of the article in Latvian
     */
    #[JsonProperty('lv')]
    private ?ArticleContent $lv;

    /**
     * @var ?ArticleContent $mn The content of the article in Mongolian
     */
    #[JsonProperty('mn')]
    private ?ArticleContent $mn;

    /**
     * @var ?ArticleContent $nb The content of the article in Norwegian
     */
    #[JsonProperty('nb')]
    private ?ArticleContent $nb;

    /**
     * @var ?ArticleContent $nl The content of the article in Dutch
     */
    #[JsonProperty('nl')]
    private ?ArticleContent $nl;

    /**
     * @var ?ArticleContent $pl The content of the article in Polish
     */
    #[JsonProperty('pl')]
    private ?ArticleContent $pl;

    /**
     * @var ?ArticleContent $pt The content of the article in Portuguese (Portugal)
     */
    #[JsonProperty('pt')]
    private ?ArticleContent $pt;

    /**
     * @var ?ArticleContent $ro The content of the article in Romanian
     */
    #[JsonProperty('ro')]
    private ?ArticleContent $ro;

    /**
     * @var ?ArticleContent $ru The content of the article in Russian
     */
    #[JsonProperty('ru')]
    private ?ArticleContent $ru;

    /**
     * @var ?ArticleContent $sl The content of the article in Slovenian
     */
    #[JsonProperty('sl')]
    private ?ArticleContent $sl;

    /**
     * @var ?ArticleContent $sr The content of the article in Serbian
     */
    #[JsonProperty('sr')]
    private ?ArticleContent $sr;

    /**
     * @var ?ArticleContent $sv The content of the article in Swedish
     */
    #[JsonProperty('sv')]
    private ?ArticleContent $sv;

    /**
     * @var ?ArticleContent $tr The content of the article in Turkish
     */
    #[JsonProperty('tr')]
    private ?ArticleContent $tr;

    /**
     * @var ?ArticleContent $vi The content of the article in Vietnamese
     */
    #[JsonProperty('vi')]
    private ?ArticleContent $vi;

    /**
     * @var ?ArticleContent $ptBr The content of the article in Portuguese (Brazil)
     */
    #[JsonProperty('pt-BR')]
    private ?ArticleContent $ptBr;

    /**
     * @var ?ArticleContent $zhCn The content of the article in Chinese (China)
     */
    #[JsonProperty('zh-CN')]
    private ?ArticleContent $zhCn;

    /**
     * @var ?ArticleContent $zhTw The content of the article in Chinese (Taiwan)
     */
    #[JsonProperty('zh-TW')]
    private ?ArticleContent $zhTw;

    /**
     * @param array{
     *   type?: ?string,
     *   ar?: ?ArticleContent,
     *   bg?: ?ArticleContent,
     *   bs?: ?ArticleContent,
     *   ca?: ?ArticleContent,
     *   cs?: ?ArticleContent,
     *   da?: ?ArticleContent,
     *   de?: ?ArticleContent,
     *   el?: ?ArticleContent,
     *   en?: ?ArticleContent,
     *   es?: ?ArticleContent,
     *   et?: ?ArticleContent,
     *   fi?: ?ArticleContent,
     *   fr?: ?ArticleContent,
     *   he?: ?ArticleContent,
     *   hr?: ?ArticleContent,
     *   hu?: ?ArticleContent,
     *   id?: ?ArticleContent,
     *   it?: ?ArticleContent,
     *   ja?: ?ArticleContent,
     *   ko?: ?ArticleContent,
     *   lt?: ?ArticleContent,
     *   lv?: ?ArticleContent,
     *   mn?: ?ArticleContent,
     *   nb?: ?ArticleContent,
     *   nl?: ?ArticleContent,
     *   pl?: ?ArticleContent,
     *   pt?: ?ArticleContent,
     *   ro?: ?ArticleContent,
     *   ru?: ?ArticleContent,
     *   sl?: ?ArticleContent,
     *   sr?: ?ArticleContent,
     *   sv?: ?ArticleContent,
     *   tr?: ?ArticleContent,
     *   vi?: ?ArticleContent,
     *   ptBr?: ?ArticleContent,
     *   zhCn?: ?ArticleContent,
     *   zhTw?: ?ArticleContent,
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
     * @return ?ArticleContent
     */
    public function getAr(): ?ArticleContent
    {
        return $this->ar;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setAr(?ArticleContent $value = null): self
    {
        $this->ar = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getBg(): ?ArticleContent
    {
        return $this->bg;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setBg(?ArticleContent $value = null): self
    {
        $this->bg = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getBs(): ?ArticleContent
    {
        return $this->bs;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setBs(?ArticleContent $value = null): self
    {
        $this->bs = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getCa(): ?ArticleContent
    {
        return $this->ca;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setCa(?ArticleContent $value = null): self
    {
        $this->ca = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getCs(): ?ArticleContent
    {
        return $this->cs;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setCs(?ArticleContent $value = null): self
    {
        $this->cs = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getDa(): ?ArticleContent
    {
        return $this->da;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setDa(?ArticleContent $value = null): self
    {
        $this->da = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getDe(): ?ArticleContent
    {
        return $this->de;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setDe(?ArticleContent $value = null): self
    {
        $this->de = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getEl(): ?ArticleContent
    {
        return $this->el;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setEl(?ArticleContent $value = null): self
    {
        $this->el = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getEn(): ?ArticleContent
    {
        return $this->en;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setEn(?ArticleContent $value = null): self
    {
        $this->en = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getEs(): ?ArticleContent
    {
        return $this->es;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setEs(?ArticleContent $value = null): self
    {
        $this->es = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getEt(): ?ArticleContent
    {
        return $this->et;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setEt(?ArticleContent $value = null): self
    {
        $this->et = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getFi(): ?ArticleContent
    {
        return $this->fi;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setFi(?ArticleContent $value = null): self
    {
        $this->fi = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getFr(): ?ArticleContent
    {
        return $this->fr;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setFr(?ArticleContent $value = null): self
    {
        $this->fr = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getHe(): ?ArticleContent
    {
        return $this->he;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setHe(?ArticleContent $value = null): self
    {
        $this->he = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getHr(): ?ArticleContent
    {
        return $this->hr;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setHr(?ArticleContent $value = null): self
    {
        $this->hr = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getHu(): ?ArticleContent
    {
        return $this->hu;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setHu(?ArticleContent $value = null): self
    {
        $this->hu = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getId(): ?ArticleContent
    {
        return $this->id;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setId(?ArticleContent $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getIt(): ?ArticleContent
    {
        return $this->it;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setIt(?ArticleContent $value = null): self
    {
        $this->it = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getJa(): ?ArticleContent
    {
        return $this->ja;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setJa(?ArticleContent $value = null): self
    {
        $this->ja = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getKo(): ?ArticleContent
    {
        return $this->ko;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setKo(?ArticleContent $value = null): self
    {
        $this->ko = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getLt(): ?ArticleContent
    {
        return $this->lt;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setLt(?ArticleContent $value = null): self
    {
        $this->lt = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getLv(): ?ArticleContent
    {
        return $this->lv;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setLv(?ArticleContent $value = null): self
    {
        $this->lv = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getMn(): ?ArticleContent
    {
        return $this->mn;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setMn(?ArticleContent $value = null): self
    {
        $this->mn = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getNb(): ?ArticleContent
    {
        return $this->nb;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setNb(?ArticleContent $value = null): self
    {
        $this->nb = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getNl(): ?ArticleContent
    {
        return $this->nl;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setNl(?ArticleContent $value = null): self
    {
        $this->nl = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getPl(): ?ArticleContent
    {
        return $this->pl;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setPl(?ArticleContent $value = null): self
    {
        $this->pl = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getPt(): ?ArticleContent
    {
        return $this->pt;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setPt(?ArticleContent $value = null): self
    {
        $this->pt = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getRo(): ?ArticleContent
    {
        return $this->ro;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setRo(?ArticleContent $value = null): self
    {
        $this->ro = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getRu(): ?ArticleContent
    {
        return $this->ru;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setRu(?ArticleContent $value = null): self
    {
        $this->ru = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getSl(): ?ArticleContent
    {
        return $this->sl;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setSl(?ArticleContent $value = null): self
    {
        $this->sl = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getSr(): ?ArticleContent
    {
        return $this->sr;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setSr(?ArticleContent $value = null): self
    {
        $this->sr = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getSv(): ?ArticleContent
    {
        return $this->sv;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setSv(?ArticleContent $value = null): self
    {
        $this->sv = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getTr(): ?ArticleContent
    {
        return $this->tr;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setTr(?ArticleContent $value = null): self
    {
        $this->tr = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getVi(): ?ArticleContent
    {
        return $this->vi;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setVi(?ArticleContent $value = null): self
    {
        $this->vi = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getPtBr(): ?ArticleContent
    {
        return $this->ptBr;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setPtBr(?ArticleContent $value = null): self
    {
        $this->ptBr = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getZhCn(): ?ArticleContent
    {
        return $this->zhCn;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setZhCn(?ArticleContent $value = null): self
    {
        $this->zhCn = $value;
        return $this;
    }

    /**
     * @return ?ArticleContent
     */
    public function getZhTw(): ?ArticleContent
    {
        return $this->zhTw;
    }

    /**
     * @param ?ArticleContent $value
     */
    public function setZhTw(?ArticleContent $value = null): self
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

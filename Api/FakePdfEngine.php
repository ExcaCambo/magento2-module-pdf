<?php
namespace Staempfli\Pdf\Api;

/**
 * Fake implementation to be used in tests
 */
class FakePdfEngine implements PdfEngine
{
    /** @var FakePdfFile */
    public $fakePdfFile;
    /**
     * @var Options
     */
    public $globalOptions;
    /**
     * @var array [string, Options]
     */
    public $cover;
    /**
     * @var Options
     */
    public $tableOfContents;
    /**
     * @var array[] array of pages as [string, Options]
     */
    public $pages = [];

    public function __construct()
    {
        $this->fakePdfFile = new FakePdfFile();
    }

    public function addPage($html, Options $options)
    {
        $this->pages[] = [$html, $options];
    }

    public function setCover($html, Options $options)
    {
        $this->cover = [$html, $options];
    }

    public function setTableOfContents(Options $options)
    {
        $this->tableOfContents = $options;
    }


    /**
     * @param Options $globalOptions
     * @param Medium $cover
     * @param Medium[] ...$pages
     * @return FakePdfFile
     */
    public function generatePdf(Options $globalOptions)
    {
        $this->globalOptions = $globalOptions;
        $this->fakePdfFile->isGenerated = true;
        return $this->fakePdfFile;
    }
}
<?php

namespace Forexite\Model;

class AssetValue
{
    /**
     * @var string
     */
    protected $asset;
    
    /**
     * @var \DateTime
     */
    protected $createdAt;
    
    /**
     * @var float
     */
    protected $open;
    
    /**
     * @var float
     */
    protected $close;
    
    /**
     * @var float
     */
    protected $high;
    
    /**
     * @var float
     */
    protected $low;
    
    /**
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }
    
    /**
     * @param string $asset
     *
     * @return AssetValue
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * @param \DateTime $createdAt
     *
     * @return AssetValue
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getOpen()
    {
        return $this->open;
    }
    
    /**
     * @param float $open
     *
     * @return AssetValue
     */
    public function setOpen($open)
    {
        $this->open = $open;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getClose()
    {
        return $this->close;
    }
    
    /**
     * @param float $close
     *
     * @return AssetValue
     */
    public function setClose($close)
    {
        $this->close = $close;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getHigh()
    {
        return $this->high;
    }
    
    /**
     * @param float $high
     *
     * @return AssetValue
     */
    public function setHigh($high)
    {
        $this->high = $high;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getLow()
    {
        return $this->low;
    }
    
    /**
     * @param float $low
     *
     * @return AssetValue
     */
    public function setLow($low)
    {
        $this->low = $low;
        return $this;
    }
    
    
}
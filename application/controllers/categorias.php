<?php

class Categorias extends CI_Controller { 
    
    /**
    * Instance for Apiki_Buscape_API class
    * @var Object
    */
    public $objBuscapeApi;
    

    /**
    * Baby's category ID on Buscape
    * @var int
    */
    protected $categoryIdBabys = 3473;
    

    /**
    * Baby's category XML
    * @var Object XML
    */
    public $categoryBabys;


    /**
    * Array containing all subcategories ID on Buscape
    * @var Array
    */
    public $aSubcategories = array(
        'subBainToilette' => array(
            'Banheira' => 'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5812', // Banheira para BebÃª
            'Condicionador' => 'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=476', // Condicionador para Bebe
            'Sabonete' => 'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=479', // Sabonete
            'Shampoo' => 'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=475', // Shampoo
            'Termômetro' => 'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10823' // Termometro para banho
        ),
        'subHygieneBabyCare' => array(
            //'293' => 'http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=293',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10597', //Aspirador Nasal
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10600', // Escova de cabelo para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10602', // Hidratante 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=481', // Agua de Colonia para o bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10599', // Creme para pentear bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10601', // Escova de dente para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=478', // Lenço Umidecido
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10603', // Oleo para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3219', // Pomada para assaduras
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=477', // Talco
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9057', // Troninho para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3113', // Termometro
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2347', // Outros de higiene
        ),
        'subFeeding' => array(
            //'5865' => 'http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=5865',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10729', // Babador 
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=10730', // Cadeirao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10731', // Caneca para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6535', // Copo
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6537', // Pratinhos
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10733', // Talheres
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10732', // Conjunto de mesa
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10734' // Outros
        ),
        'subBottlesAcessories' => array(
            //'3326',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5490', // Mamadeira 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10812', // Aquecedor de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5489', // Bico de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10813', // Escorredor de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10814', // Escova para mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10815', // Esterelizador
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10816', // Porta mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5711' // Outros
            
        ),
        'subPacifierAccessories' => array(
            //'3305'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11029', // Chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11030', // Porta chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11031', // Prendedor de chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11032' // Outros
        ),
        'subToys' => array(
            // '2412'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10323', // Chocalho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5808', // Mobile
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10322', // Mordedor
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10324' // Outros
        ),
        'subBedroom' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5809', // Berço
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10820', // Protetor de berço
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6557,', // Cama, Mesa e Banho 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=8766' // Enfeite / Decoração para Quarto do Bebê
        ),
        'subStroll' => array(
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10817', // Canguru para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6536' // Bolsa, mala e trocador para bebe
        ),
        'subClothes' => array(
            // '2470'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2488', // Blusinhas
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2487', // Calça
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2489', // Camisetas
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6548', // Conjuntinho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5867', // Macacao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9572', // Maiô
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10592', // Pijama
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6549', // Shorts
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9571', // Sunga
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6550', // Vestidinho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2503', // Outros
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6554' // Calçados
        ),
        'subActivities' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5805', // Andador
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=9795' // Tapetes de Atividades
        ),
        'subHomeSafety' => array(
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10818', // Grade de proteçao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10819', // Mosquiteiro
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10822',  // Protetor de quina
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10821', // Protetor de tomada
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10824', // Trava de segurança
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=7727', // Almofada anti-refluxo
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=9907', // Cercado para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10825' // Outros
        ),
        'subForCar' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5816', // Cadeira para Auto
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11013' // Base de Cadeira para Auto
        ),
        'subBabyGear' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5807', // Baba eletronica
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10969'// Cadeira de Descanso para Bebê 
        ),
        'subBabyStrollers' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=5817' // Carrinho para Bebê
        ),
        'subDiapers' => array(
            'http://sandbox.buscape.com/service/findProductList/lomadee/7838643852314c587376343d/br/?categoryId=482' // Fraldas
        ),
        'subForMom' => array(
            //'6160',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10735', // almofada para amamentaçao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10736', // Bombinha para tirar leite
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10738', // Conchas para Amamentação
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10737', // Lingerie para mamae
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=8430', // Creme anti-estrias
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3448', // Album de fotos
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10739' // Outros
        )
    );
    
    /* Subcategories 
     --------------------------------------------- */
    // Banho: 5812 (Banheira para BebÃª)        
    // Higiene e Cuidados: 293 (Higiene / SaÃºde para BebÃª)
    // Hora da refeiçao: 5865 (UtensÃ­lios para AlimentaÃ§Ã£o do BebÃª)
    // Mamadeiras, Chupeta  e Acessorios: 3326 (Mamadeira e AcessÃ³rios), 3305 (Chupeta e AcessÃ³rios)
    // Brinquedos: 2412 (Brinquedos para BebÃª)
    // Quarto: 5809 (BerÃ§o), 6557 (Cama / Mesa / Banho para BebÃª), 8766 (Enfeite / DecoraÃ§Ã£o para Quarto do BebÃª)
    // Passeio: 6536 (Bolsa / Mala / Trocador para BebÃª)
    // Roupinhas: 2470 (Moda para BebÃª)
    // Atividades e Brincadeiras: 5805 (Andador para BebÃª)
    // Segurança em casa: 5811 (Artigos de SeguranÃ§a para BebÃª) 
    // Para o carro: 11013 (Base de Cadeira para Auto), 5816 (Cadeira para Auto), 
    // Carrinho de bebê: 5817
    // Fraldas: 482
    // Para a mamae: 6160 (UtensÃ­lios Diversos para a MamÃ£e)
    
    /* Top5Categories
     --------------------------------------------- */
    // Higiene e Cuidados: 3113 (TermÃ´metro)
    // Hora da refeiçao: 10730 (CadeirÃ£o para BebÃª)
    // Roupinhas: 6554 (CalÃ§ados para BebÃª)
    // Atividades e Brincadeiras: 9795 (Tapetes de Atividades)
    // Equipamentos para o bebê: 5807 (BabÃ¡ EletrÃ´nica), 10969 Cadeira de Descanso para BebÃª, 9907 (Cercado para BebÃª)
    // Para a mamae: 3448 (Ãlbum de Fotos)

    
    /**
    * Each subcategory for us 
    * @var array
    */
    public $subBainToilette; // Banho e toilette
    public $subHygieneBabyCare; // Higiene e Cuidados
    public $subFeeding; // Hora da refeiçao
    public $subBottlesAcessories; // Mamadeiras e Acessorios
    public $subPacifier; // Chupetas e Acessorios
    public $subToys; // Brinquedos
    public $subBedroom; // Quarto
    public $subStroll; // Passeio
    public $subClothes; // Roupinhas
    public $subActivities; // Atividades e Brincadeiras
    public $subHomeSafety; // Segurança em casa
    public $subForCar; // Para o carro
    public $subBabyGear; // Equipamentos para o bebê
    public $subBabyStrollers; // Carrinho de bebê
    public $subDiapers; // Fraldas
    public $subForMom; // Para a mamae
    
    

    public function __construct() {
        parent::__construct();
        
        //$applicationID = '7838643852314c587376343d';
        //$sourceID = '9262544';
        //$this->load->library('Apiki_Buscape_API', array($applicationID));
        
        // Instance for Apiki_Buscape_API class
        //$this->objBuscapeApi = new Apiki_Buscape_API( $applicationID );
        //$this->objBuscapeApi->setSandbox();
    }
    

    public function index() { 
        $subCategory = '';
        
        $data['aSubCategoryCompareProducts'] = $this->getSubcategoryProducts('subBainToilette');
        $data['aSubCategoryOffers'] = $this->getSubcategoryOffers('subBainToilette');       

        $this->load->view('templates/header', $data);
        $this->load->view('categorias/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    /*
    * Caching the subcategories that have findProductList. It means that this sub-subcategory has price comparing
    * @param {String} - the subcategory name that is a key of $aSubcategories array
    * It caches findOfferList of each product
    */
    public function cachingSubcategoryProducts($subcategoryName) {
        $aCache = array();
        $aProductOffersUrl = array();

        foreach ($this->aSubcategories[$subcategoryName] as $name => $url) {
            $urlParsed = parse_url($url);

            if(preg_match('/findProductList/', $urlParsed['path'])) 
            {
                $contentUrl = file_get_contents($url);
                $contentXML = simplexml_load_string($contentUrl);

                $aProducts = $contentXML->product;

                foreach ($aProducts as $key => $product) {
                    $aProductLinks = $product->links->children();

                    foreach ($aProductLinks as $key => $link) {
                        if($link->attributes()->type == 'xml')
                        {
                            $attrUrl = substr( $link->attributes()->url->asXML() , 6, -1);
                            array_push($aProductOffersUrl, file_get_contents($attrUrl));
                        }  
                    }
                }
                $aCache[$name] = $aProductOffersUrl; 
            }
        }

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->save($subcategoryName . '_products', $aCache, 3600);
    }


    /*
    * Caching the subcategories that have findOfferList. It means that this sub-subcategory has no price comparing
    * @param {String} - the subcategory name that is a key of $aSubcategories array
    * It caches findOfferList of each product
    */
    public function cachingSubcategoryOffers($subcategoryName) {
        $aCache = array();

        foreach ($this->aSubcategories[$subcategoryName] as $name => $url) {
            $urlParsed = parse_url($url);
            
            if(preg_match('/findOfferList/', $urlParsed['path'])) 
            {
                $aCache[$name] = file_get_contents($url); 
            }

        }

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->save($subcategoryName . '_offers', $aCache, 3600);
    }


    /*
    * Get the subcategories products that had findProductList. It means that this sub-subcategory has price comparing
    * @param {String} - the subcategory name that is a key of $aSubcategories array
    * @return Array with subcategoryName->name as key and array with each product
    */
    public function getSubcategoryProducts($subcategoryName) {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if(!$this->cache->get($subcategoryName . '_products'))
        { 
            echo 'NOT CACHE';
            $this->cachingSubcategoryProducts($subcategoryName);
            $this->$subcategoryName = $this->cache->get($subcategoryName . '_products');
        }

        else
        {
            echo 'CACHE'; 
            $this->$subcategoryName = $this->cache->get($subcategoryName . '_products');
        }

        $aProducts = array();
        foreach ($this->$subcategoryName as $name => $aContentUrl) {
            $aProducts[$name] = array();

            foreach ($aContentUrl as $key => $contentUrl) {
            
                $xml = simplexml_load_string($contentUrl);

                $aEachProduct = array();
                $aEachProduct['product_name'] = (string) $xml->product->productName;
                $aEachProduct['product_image'] = (string) $xml->product->thumbnail->attributes()->url;
                $aEachProduct['product_offers'] = array();
                
                foreach ($xml->offer as $offer) {
                    $aEachOffer = array(); 
                    $aEachOffer['store'] = (string) $offer->seller->sellerName;
                    $aEachOffer['price'] = (string) $offer->price->value;
                    $aEachOffer['link'] = (string) $offer->links->link->attributes()->url;
                    $aEachOffer['ebit'] = (string) $offer->seller->rating->eBitRating->rating;
                    
                    array_push($aEachProduct['product_offers'], $aEachOffer);

                }
                
                array_push($aProducts[$name], $aEachProduct);
            }
        }

        return $aProducts;
    }



    /*
    * Get the subcategories products that had findOfferList. It means that this sub-subcategory has no price comparing
    * @param {String} - the subcategory name that is a key of $aSubcategories array
    * @return Array with subcategoryName->name as key and array with each product
    */
    public function getSubcategoryOffers($subcategoryName) { 
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if(!$this->cache->get($subcategoryName . '_offers'))
        { 
            echo 'NOT CACHE';
            $this->cachingSubcategoryOffers($subcategoryName);
            $this->$subcategoryName = $this->cache->get($subcategoryName . '_offers');
        }

        else
        {
            echo 'CACHE'; 
            $this->$subcategoryName = $this->cache->get($subcategoryName . '_offers');
        }

        $aProducts = array();
        foreach ($this->$subcategoryName as $name => $contentUrl) {
            $aProducts[$name] = array();

            $xml = simplexml_load_string($contentUrl);
            
            foreach ($xml->offer as $offer) {
                $aEachProduct = array();
                $aEachProduct['product_name'] = (string) $offer->offerName;
                $aEachProduct['product_image'] = (string) $offer->thumbnail->attributes()->url;
                $aEachProduct['store'] = (string) $offer->seller->sellerName;
                $aEachProduct['price'] = (string) $offer->price->value;
                $aEachProduct['link'] = (string) $offer->links->link->attributes()->url;
                $aEachProduct['ebit'] = (string) $offer->seller->rating->eBitRating->rating;
            
                array_push($aProducts[$name], $aEachProduct);
            }
            
        }

        return $aProducts;
    }
    
    
}
?>
<?php

namespace DoctrineProxies\__CG__\OrangeHRM\Entity;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UserAuthProvider extends \OrangeHRM\Entity\UserAuthProvider implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'id', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'user', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'type', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserHash', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserDN', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserUniqueId'];
        }

        return ['__isInitialized__', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'id', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'user', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'type', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserHash', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserDN', '' . "\0" . 'OrangeHRM\\Entity\\UserAuthProvider' . "\0" . 'ldapUserUniqueId'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UserAuthProvider $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load(): void
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized(): bool
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized): void
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null): void
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer(): ?\Closure
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null): void
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner(): ?\Closure
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties(): array
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId(int $id): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): \OrangeHRM\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\OrangeHRM\Entity\User $user): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setType(int $type): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getLDAPUserHash(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLDAPUserHash', []);

        return parent::getLDAPUserHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setLDAPUserHash(?string $ldapUserHash): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLDAPUserHash', [$ldapUserHash]);

        parent::setLDAPUserHash($ldapUserHash);
    }

    /**
     * {@inheritDoc}
     */
    public function getLDAPUserDN(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLDAPUserDN', []);

        return parent::getLDAPUserDN();
    }

    /**
     * {@inheritDoc}
     */
    public function setLDAPUserDN(?string $ldapUserDN): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLDAPUserDN', [$ldapUserDN]);

        parent::setLDAPUserDN($ldapUserDN);
    }

    /**
     * {@inheritDoc}
     */
    public function getLDAPUserUniqueId(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLDAPUserUniqueId', []);

        return parent::getLDAPUserUniqueId();
    }

    /**
     * {@inheritDoc}
     */
    public function setLDAPUserUniqueId(?string $ldapUserUniqueId): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLDAPUserUniqueId', [$ldapUserUniqueId]);

        parent::setLDAPUserUniqueId($ldapUserUniqueId);
    }

}

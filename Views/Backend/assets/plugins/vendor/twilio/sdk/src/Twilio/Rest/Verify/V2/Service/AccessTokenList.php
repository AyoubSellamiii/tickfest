<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Verify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;


class AccessTokenList extends ListResource
    {
    /**
     * Construct the AccessTokenList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The unique SID identifier of the Service.
     */
    public function __construct(
        Version $version,
        string $serviceSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'serviceSid' =>
            $serviceSid,
        
        ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid)
        .'/AccessTokens';
    }

    /**
     * Create the AccessTokenInstance
     *
     * @param string $identity The unique external identifier for the Entity of the Service. This identifier should be immutable, not PII, and generated by your external system, such as your user's UUID, GUID, or SID.
     * @param string $factorType
     * @param array|Options $options Optional Arguments
     * @return AccessTokenInstance Created AccessTokenInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $identity, string $factorType, array $options = []): AccessTokenInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'Identity' =>
                $identity,
            'FactorType' =>
                $factorType,
            'FactorFriendlyName' =>
                $options['factorFriendlyName'],
            'Ttl' =>
                $options['ttl'],
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new AccessTokenInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid']
        );
    }


    /**
     * Constructs a AccessTokenContext
     *
     * @param string $sid A 34 character string that uniquely identifies this Access Token.
     */
    public function getContext(
        string $sid
        
    ): AccessTokenContext
    {
        return new AccessTokenContext(
            $this->version,
            $this->solution['serviceSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Verify.V2.AccessTokenList]';
    }
}
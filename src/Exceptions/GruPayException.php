<?php

namespace LukasCCB\GruPay\Exceptions;

use Exception;

class GruPayException extends Exception
{
    /**
     * The error response from GruPay.
     *
     * @var array
     */
    protected array $errors = [];

    /**
     * Get the error response from GruPay.
     *
     * @return array
     */
    public function getError(): array
    {
        return $this->errors;
    }

    /**
     * Set the error response from GruPay.
     *
     * @param  array  $error
     * @return self
     */
    public function setError(array $error): self
    {
        $this->errors = $error;

        return $this;
    }
}

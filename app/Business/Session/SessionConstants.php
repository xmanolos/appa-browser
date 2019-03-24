<?php

namespace App\Business\Session;

use Illuminate\Http\Request;

/**
 * Provides variables for the constant values of Session.
 *
 * @package App\Business\Session
 */
class SessionConstants
{
    /**
     * Name of the Connection Driver property.
     * This refers to the driver used to establish the Connection (MySQL, PostgreSQL).
     */
    public const CONNECTION_DRIVER = 'driver';

    /**
     * Name of the Connection Hostname property.
     * This refers to the hostname used to establish the connection.
     */
    public const CONNECTION_HOSTNAME = 'hostname';

    /**
     * Name of the Connection Port property.
     * This refers to the port number used to establish the Connection.
     */
    public const CONNECTION_PORT = 'port';

    /**
     * Name of the Connection Username property.
     * This refers to the username used to establish the Connection.
     */
    public const CONNECTION_USERNAME = 'username';

    /**
     * Name of the Connection Password property.
     * This refers to the password used to establish the Connection.
     */
    public const CONNECTION_PASSWORD = 'password';

    /**
     * Name of the Connection Database property.
     * This refers to the database used to establish the Connection.
     */
    public const CONNECTION_DATABASE = 'database';

    /**
     * Name of the Connection Connected (flag) property.
     * This refers to the flag that manages the current state of the Connection.
     */
    public const CONNECTION_CONNECTED = 'connected';

    /**
     * Name of the Client Data Selected Schema property.
     * This refers to the Schema selected by the Client.
     */
    public const CLIENT_DATA_SELECTED_SCHEMA = 'selected-schema';

    /**
     * The text to be displayed in cases where the value of the Connection property is unknown.
     */
    public const CONNECTION_DEFAULT_TEXT = 'Unknown';
}

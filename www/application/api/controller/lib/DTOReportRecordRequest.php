<?php

namespace app\api\controller\lib;

class DTOReportRecordRequest extends ApiBaseDTO
{
    public static function instance()
    {
        return new self();
    }

    protected $server_receive_timestamp = 0.0;

    protected $client_addr = "";
    protected $client_user_agent = "";
    protected $client_timestamp = 0.0;
    protected $client_screen_size = [0, 0]; // h,w
    protected $client_url = "";
    protected $client_referrer = "";
    protected $client_init_code = '';
    protected $client_report_code = '';

    protected $error_message = "";
    protected $error_url = "";
    protected $error_line = 0;
    protected $error_col = 0;
    protected $error_stack = [];


    // =========================

    /**
     * @param string $raw_client_screen_size
     */
    public function setClientScreenSizeByCompressedRaw($raw_client_screen_size)
    {
        $this->client_screen_size = [0, 0];

        $group = explode(',', $raw_client_screen_size);
        if (count($group) === 2) {
            $h = (int)$group[0];
            $w = (int)$group[1];
            $this->client_screen_size = [$h, $w];
        }
    }

    /**
     * @param array $error_stack
     */
    public function setErrorStackByCompressedRaw(string $raw_error_stack)
    {
        $stack = json_decode($raw_error_stack, true);
        if (empty($stack)) {
            $stack = [];
        }
        $this->error_stack = $stack;
    }
    // =========================


    /**
     * @return float
     */
    public function getServerReceiveTimestamp(): float
    {
        return $this->server_receive_timestamp;
    }

    /**
     * @param float $server_receive_timestamp
     */
    public function setServerReceiveTimestamp(float $server_receive_timestamp)
    {
        $this->server_receive_timestamp = $server_receive_timestamp;
    }

    /**
     * @return string
     */
    public function getClientAddr(): string
    {
        return $this->client_addr;
    }

    /**
     * @param string $client_addr
     */
    public function setClientAddr(string $client_addr)
    {
        $this->client_addr = $client_addr;
    }

    /**
     * @return string
     */
    public function getClientUserAgent(): string
    {
        return $this->client_user_agent;
    }

    /**
     * @param string $client_user_agent
     */
    public function setClientUserAgent(string $client_user_agent)
    {
        $this->client_user_agent = $client_user_agent;
    }

    /**
     * @return float
     */
    public function getClientTimestamp(): float
    {
        return $this->client_timestamp;
    }

    /**
     * @param float $client_timestamp
     */
    public function setClientTimestamp(float $client_timestamp)
    {
        $this->client_timestamp = $client_timestamp;
    }

    /**
     * @return array
     */
    public function getClientScreenSize(): array
    {
        return $this->client_screen_size;
    }

    /**
     * @param array $client_screen_size
     */
    public function setClientScreenSize(array $client_screen_size)
    {
        $this->client_screen_size = $client_screen_size;
    }

    /**
     * @return string
     */
    public function getClientUrl(): string
    {
        return $this->client_url;
    }

    /**
     * @param string $client_url
     */
    public function setClientUrl(string $client_url)
    {
        $this->client_url = $client_url;
    }

    /**
     * @return string
     */
    public function getClientReferrer(): string
    {
        return $this->client_referrer;
    }

    /**
     * @param string $client_referrer
     */
    public function setClientReferrer(string $client_referrer)
    {
        $this->client_referrer = $client_referrer;
    }

    /**
     * @return string
     */
    public function getClientInitCode(): string
    {
        return $this->client_init_code;
    }

    /**
     * @param string $client_init_code
     */
    public function setClientInitCode(string $client_init_code)
    {
        $this->client_init_code = $client_init_code;
    }

    /**
     * @return string
     */
    public function getClientReportCode(): string
    {
        return $this->client_report_code;
    }

    /**
     * @param string $client_report_code
     */
    public function setClientReportCode(string $client_report_code)
    {
        $this->client_report_code = $client_report_code;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @param string $error_message
     */
    public function setErrorMessage(string $error_message)
    {
        $this->error_message = $error_message;
    }

    /**
     * @return string
     */
    public function getErrorUrl(): string
    {
        return $this->error_url;
    }

    /**
     * @param string $error_url
     */
    public function setErrorUrl(string $error_url)
    {
        $this->error_url = $error_url;
    }

    /**
     * @return int
     */
    public function getErrorLine(): int
    {
        return $this->error_line;
    }

    /**
     * @param int $error_line
     */
    public function setErrorLine(int $error_line)
    {
        $this->error_line = $error_line;
    }

    /**
     * @return int
     */
    public function getErrorCol(): int
    {
        return $this->error_col;
    }

    /**
     * @param int $error_col
     */
    public function setErrorCol(int $error_col)
    {
        $this->error_col = $error_col;
    }

    /**
     * @return array
     */
    public function getErrorStack(): array
    {
        return $this->error_stack;
    }

    /**
     * @param array $error_stack
     */
    public function setErrorStack(array $error_stack)
    {
        $this->error_stack = $error_stack;
    }


}
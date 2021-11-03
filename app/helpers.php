<?php

function coreResponse($message, $data = null, $statusCode, $isSuccess = true) {
  // Check the params
  if(!$message) return response()->json(['message' => 'Message is required'], 500);

  // Send the response
  if($isSuccess) {
      return response()->json([
          'message' => $message,
          'code' => $statusCode,
          'results' => $data
      ], $statusCode);
  } else {
      return response()->json([
          'message' => $message,
          'error' => true,
          'code' => $statusCode,
      ], $statusCode);
  }
}

/**
   * Send any success response
   * 
   * @param   string          $message
   * @param   array|object    $data
   * @param   integer         $statusCode
   */
  function success($message, $data = null, $statusCode = 200)
  {
      return coreResponse($message, $data, $statusCode);
  }

  /**
   * Send any error response
   * 
   * @param   string          $message
   * @param   integer         $statusCode    
   */
  function error($message, $statusCode = 500)
  {
      return coreResponse($message, null, $statusCode, false);
  }
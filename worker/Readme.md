# Worker

- consumes SQS queue: MSG_UPLOAD_VIDEO

## Logic :
- uses custom middleware with stamp to handle retries with local sqlite for temporary state:
  - when the message comes at first (0) -> api vimeo "pull" file
  - dispatches a "check_provider_upload_ack" message, handled by itself
  - saves a status "file uploaded"
  - dispatches a "check_provider_status" message, handled by itself
  - file_transcoded_status === OK ?  ack msg
  - file_transcoded_status === NOK ? do not ack msg -> write a try 1 in local db
  - messenger retry -> status ? ack : do not ack
  - after "n" retry (to be defined) -> dispatch a "Failed status" to API

**The idea is that the api will know the definitive status after we performed all the polling**

When failed is returned to API, Api will trigger an email until then, it's in temporary status

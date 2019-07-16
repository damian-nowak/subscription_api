define({ "api": [
  {
    "type": "delete",
    "url": "/clients/:id",
    "title": "Remove client.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteClient",
    "group": "Clients",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Client removed.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientController.php",
    "groupTitle": "Clients",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients/:id",
    "title": "Display the specified client.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetClient",
    "group": "Clients",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "client",
            "description": "<p>Client's data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientController.php",
    "groupTitle": "Clients",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients",
    "title": "Request all clients",
    "version": "0.1.0",
    "name": "GetClients",
    "group": "Clients",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "client",
            "description": "<p>List of all clients.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientController.php",
    "groupTitle": "Clients"
  },
  {
    "type": "post",
    "url": "/clients",
    "title": "Store a newly created client.",
    "version": "0.1.0",
    "name": "PostClient",
    "group": "Clients",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>required username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>required, unique user email</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "201": [
          {
            "group": "201",
            "type": "Object",
            "optional": false,
            "field": "client",
            "description": "<p>New client data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientController.php",
    "groupTitle": "Clients",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/clients/:id",
    "title": "Update client data.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client's unique ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>new username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>new unique user email</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PutClient",
    "group": "Clients",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "client",
            "description": "<p>Updated client data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientController.php",
    "groupTitle": "Clients",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/clients/:id/subs/:id",
    "title": "Client unsubscribes.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteClientSubs",
    "group": "Clients_Subscriptions",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Subscription removed.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientSubscriptionController.php",
    "groupTitle": "Clients_Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients/:id/subs",
    "title": "Display client's subscriptions.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetClientSubs",
    "group": "Clients_Subscriptions",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object[]",
            "optional": false,
            "field": "subscription",
            "description": "<p>Client subscriptions data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientSubscriptionController.php",
    "groupTitle": "Clients_Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients/:id/subs/:id",
    "title": "Verify client's subscription entitlement.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetClientSubscription",
    "group": "Clients_Subscriptions",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "subscription",
            "description": "<p>If client owns subscription - returns subscription data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientSubscriptionController.php",
    "groupTitle": "Clients_Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/clients/:id/subs/:id",
    "title": "Client's new subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PostClientSubs",
    "group": "Clients_Subscriptions",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Subscription added.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientSubscriptionController.php",
    "groupTitle": "Clients_Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/clients/:id/videos/:id",
    "title": "Client's video removed.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteClientVideo",
    "group": "Clients_Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Video added.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientVideoController.php",
    "groupTitle": "Clients_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients/:id/videos/:id",
    "title": "Verify client's video entitlement.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetClientVideo",
    "group": "Clients_Videos",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "video",
            "description": "<p>If client owns video - returns video data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientVideoController.php",
    "groupTitle": "Clients_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/clients/:id/videos",
    "title": "Display client's videos.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetClientVids",
    "group": "Clients_Videos",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object[]",
            "optional": false,
            "field": "video",
            "description": "<p>Client videos data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientVideoController.php",
    "groupTitle": "Clients_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/clients/:id/videos/:id",
    "title": "Client's new video.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Client unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PostClientVideo",
    "group": "Clients_Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Video added.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Clients/Http/Controllers/ClientVideoController.php",
    "groupTitle": "Clients_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/subs/:id",
    "title": "Remove subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteSubscription",
    "group": "Subscriptions",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Subscription removed.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionController.php",
    "groupTitle": "Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/subs/:id",
    "title": "Display the specified subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetSubscription",
    "group": "Subscriptions",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "subscription",
            "description": "<p>Subscription's data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionController.php",
    "groupTitle": "Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/subs",
    "title": "Request all subscriptions",
    "version": "0.1.0",
    "name": "GetSubscriptions",
    "group": "Subscriptions",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "subscription",
            "description": "<p>List of all subscriptions.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionController.php",
    "groupTitle": "Subscriptions"
  },
  {
    "type": "post",
    "url": "/subs",
    "title": "Store a newly created subscription.",
    "version": "0.1.0",
    "name": "PostSubscription",
    "group": "Subscriptions",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>required subscription name</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "201": [
          {
            "group": "201",
            "type": "Object",
            "optional": false,
            "field": "subscription",
            "description": "<p>New subscription data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionController.php",
    "groupTitle": "Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/subs/:id",
    "title": "Update subscription data.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription's unique ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>new subscription name</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PutSubscription",
    "group": "Subscriptions",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "subscription",
            "description": "<p>Updated subscription's data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionController.php",
    "groupTitle": "Subscriptions",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/subs/:id/videos/:id",
    "title": "Remove video from subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteSubscriptionVideo",
    "group": "Subscriptions_Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Video removed.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionVideoController.php",
    "groupTitle": "Subscriptions_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/subs/:id/videos",
    "title": "Display videos connected with subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetSubscriptionVids",
    "group": "Subscriptions_Videos",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object[]",
            "optional": false,
            "field": "video",
            "description": "<p>Subscription videos data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionVideoController.php",
    "groupTitle": "Subscriptions_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/subs/:id/videos/:id",
    "title": "Add video to subscription.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Subscription unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PostSubscriptionVideo",
    "group": "Subscriptions_Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Video added.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Subscriptions/Http/Controllers/SubscriptionVideoController.php",
    "groupTitle": "Subscriptions_Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/subs/:id",
    "title": "Remove video.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Video's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "DeleteVideo",
    "group": "Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "204",
            "description": "<p>Video removed.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Videos/Http/Controllers/VideoController.php",
    "groupTitle": "Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/subs/:id",
    "title": "Display the specified video.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Video's unique ID</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "GetVideo",
    "group": "Videos",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "video",
            "description": "<p>Video's data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Videos/Http/Controllers/VideoController.php",
    "groupTitle": "Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/videos",
    "title": "Request all videos",
    "version": "0.1.0",
    "name": "GetVideos",
    "group": "Videos",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "video",
            "description": "<p>List of all videos.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Videos/Http/Controllers/VideoController.php",
    "groupTitle": "Videos"
  },
  {
    "type": "post",
    "url": "/subs",
    "title": "Store a newly created video.",
    "version": "0.1.0",
    "name": "PostVideo",
    "group": "Videos",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>required video name</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "201": [
          {
            "group": "201",
            "type": "Object",
            "optional": false,
            "field": "video",
            "description": "<p>New video data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Videos/Http/Controllers/VideoController.php",
    "groupTitle": "Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/subs/:id",
    "title": "Update video data.",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Video's unique ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>new video name</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "name": "PutVideo",
    "group": "Videos",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "Object",
            "optional": false,
            "field": "video",
            "description": "<p>Updated video's data.</p>"
          }
        ]
      }
    },
    "filename": "./domain/Videos/Http/Controllers/VideoController.php",
    "groupTitle": "Videos",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>ResourceNotFound The requested resource was not found.</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "422",
            "description": "<p>InvalidDataError The payload sent with request has invalid / is missing needed data.</p>"
          }
        ]
      }
    }
  },
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./public/apidoc/main.js",
    "group": "_home_tzeencz_Workspace_PHP_subscription_api_public_apidoc_main_js",
    "groupTitle": "_home_tzeencz_Workspace_PHP_subscription_api_public_apidoc_main_js",
    "name": ""
  }
] });

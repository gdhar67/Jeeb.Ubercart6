# Using the Jeeb plugin for Drupal 6 Ubercart

## Prerequisites
You must have a Jeeb merchant account to use this plugin.


## Installation

Copy these files into sites/all/modules/ in your Drupal directory.

## Configuration

**Jeeb Settings**

1. Get the signature from your Jeeb merchant account.
2. Paste the API Key ID string that you created and copied in Signature field.
3. Choose which environment you want (Live/Test).
4. Set a Base currency(it usually should be the currency of your store) and Target Currency(It is a multi-select option. You can choose any cryptocurrency from the listed options.).
5. Set the language of the payment page (you can set Auto-Select to auto detecting manner).
6. Set the Redirect Url as you wish to redirect the customer after the payment.

Save your changes and you're good to go!

## Usage

When a client chooses the Jeeb payment method, they will be presented with an invoice showing a button they will have to click on in order to pay their order.  Upon requesting to pay their order, the system takes the client to a full-screen Jeeb invoice page where the client is presented with payment instructions.  Once payment is received, a link is presented to the shopper that will return them to your website.

**Note:** Don't worry!  A payment will automatically update your Ubercart store whether or not the customer returns to your website after they've paid the invoice.

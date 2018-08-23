<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016090900468384",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAufgOrnkSxsxvRi6g4uGgLsHu0si1oy8WvZp9ZCZ+OhtsHSsYj4ztjt+EYYcY8zSZQeq+tMAyxZwRMp5cpQI9peCwOyGYibsTjpqnYoeGnS2j72xS7QoBbrHWJ6F8FiMFDP3PpjtcNIS6tg63FkkiQt6UidgKCHA33gxJgpQQ5WntpQQw646lZM2N92yQgq1wyx8RyRj7JAWkGh0BwjFV6HUHOkDjdRAAjj5FyDqjG2ZPToKWlq/qeUkoo9+WVr7IHtDsOZIiOJzdhuxD/pKltXY/k663XecVeWvAUl1Ui/9dZD9AZcayUfUV1uGs8mDRcRYEhETo9Mm1MMBBFr+hDwIDAQABAoIBAQCZ1II4eng4r7S/5iQ5aI96/fqSq2nscTAraJaeeGTjpflZa2OmotmC3IuBrSHLU9AOQaK8m1ukMIPdTjeuWtsp0mGUmCa4j2IPDQi2rQqCC9XWX9F8uFEVAs/1+lNNcGxmIbFZfTK5Uq2rmSKDsb1AeSN/npA2CLV93MYV2GrdiMdkaZhGi1l0snnwtfapJU98v0tWhYVHwakVAkg1AH2B45rFvNRTb3hWfQYtubgs285esdGAVXnY4hhNGRlyNlLhhW1mgv/H5N4+/q6mr3djPqFWhKgDvQ0CGZShjBggqMdcxXeQK95NBZwTF3ngJQ/Id/qEk2v9sVTiyfb1lYqJAoGBAOfBvhoAp/jcFmUMiFShL3o9quV96HJiGkHB+tYc7zErQ1RKTv10Fo1Y/P7fItpqUf/JB1awmtvkK/aPjW/rxzvZM3Fdwkuu7TldSUPZQGBCqHicBDsua6vkSkyycKlbaCt8qaFEh/wVmoSb0ptlTZ+aY3dt9f5C9IGj5o98SVAdAoGBAM1sJ3Ppt7Eg7LK49WD4G3LM6IGWq9uTYHqSOHt3DV1j+umeqXtauPQ+qPrjOAc4toeVAeedZtAm8X1umYeVCfgZ9fsPQ5gYc7XEmotsWUiV3eHXXsjHdY2i8f+ndTSuL17fVKkD7Bfa/XPoHS3NNWwTfktZqtLyGzrtBAj1WYYbAoGBAICz5El2cdHPD5TAV/l/pekh1AUsXekft+squY0sdlz85KArwCAa1udaMu2rpyRahP0ie7PV0bopxYxgfjBYZMVEwr/DTMJQ+6auuqA2RvzuJ7cLFYJ0LhFAb06WjeBPRdNYoK9Rap9AtBXOny/zGx92UqShaUnxju1rwv+OCvy1AoGAX4NSNMsO5gTxCYiGTzgNSyuLT/XGoqm7ykICkSWhyTKbj9R96SUdqjMYTs8nVfRAqnnWEONW0qHI1xF9wVTC9eDcRoeqXiXAZ1uqn/kY6m8EY+XH5IMZXWnOK5ipHn1++RXOP2fbdpwUDLh4GLu5gy7tIgvnKX34u0VJAwFRRtECgYBMJ/cgQv881gbsH7XtnOndpFy/HqvL5M8Y8n5sNuj709fRJfoOTRHfnLrMEOCtRhDy9ZscQJ7hlHq/jCz/tgLka0xq7T45z9nNnikKx4zWHEEX0HXZy+GOGRLAbdyje54sjGbH/xv7PQiI8ebOoIqNnDtVMMTF7x5yvsNTV7K8PA==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关(沙箱环境alipaydev)
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do", 

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuAOpKiizg/WmN15gYAsFoalJ2i4855gwj0TPI7kVZEFFBbrDwZ61ct1kmASp9FHzCbxy6ovS4lTRG/D6Zc+B56Y1adufxe/UUAkVHEg0fPo90aod8lE81XS79rNpYmZ2Hw2qjOrTYoXzpofQJrRPyz9K/AhMWgKkNORXJWaxhUG3bRsFFPICwC3v0PyMx3LLJ+yDOgZJnR9xqboklJ6Gl+tTFl9vUmAXk9Y8ECX/ja+vCyxPI5uVNOhsBIT/LbfNpI6DS6M7d/w5FgJ4kzBG7BR3/ff5j2/Tqz3dKRGxMnq++3likWbEGUbpdofHQOMiI+xYz5rfj2RXHKCoX2ki6QIDAQAB",
);
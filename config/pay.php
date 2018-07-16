<?php
/**
 * 广电支付系统支付配置
 */

return array(
	/* 支付渠道 */
    'PayChannel' => [
		/* 微信 */
		'WeChatPay'   => 1,
		/* 支付宝 */
		'AliPay'      => 2,
		/* 扫呗 */
		'SaoBeiPay'   => 5,
		/* 银联 */
		'Unionpay'    => 3,
		/* 现金 */
		'Cash'        => 4,
		/* QQ钱包 */
		'QQWallet'    => 5,
		/* 百度钱包 */
		'BaiduWallet' => 6,
		/* 建设银行 */
		'CCB'         => 7,
		/* 实物卡 */
		'ValueCard'   => 8,
		/* 京东 */
		'ValueCard'   => 9,
		/* 建设银行 */
		'ICBC'        => 10,
		/* 混合 */
		'Mixture'     => 9999
	],
	/* 支付渠道别名 */
    'PayChannelAlias' => [
		/* 微信 */
		'微信'        => 1,
		/* 支付宝 */
		'支付宝'      => 2,
		/* 扫呗 */
		'扫呗'        => 5,
		/* 银联 */
		'银联'        => 3,
		/* 现金 */
		'现金'        => 4,
		/* QQ钱包 */
		'QQ钱包'      => 5,
		/* 百度钱包 */
		'百度钱包'    => 6,
		/* 建设银行 */
		'建设银行'    => 7,
		/* 实物卡 */
		'实物卡'      => 8,
		/* 京东 */
		'京东'        => 9,
		/* 建设银行 */
		'建设银行'    => 10,
		/* 混合 */
		'混合'        => 9999
	],
	/* 支付渠道其他类型 */
    'PayChannelType' => [
		
	],
	/* 支付形式 */
    'PayMode' => [
		/* 现金 */
		'Cash' => 11,
		/* 银行刷卡/芯片 */
		'SwipingCard' => 3,
		/* 主动扫码 */
		'Scan' => 4,
		/* 被动扫码 */
		'PassiveScan' => 1,
		/* PC网关支付 */
		'PcGateway' => 2,
		/* Wap网关支付 */
		'WapGateway' => 12,
		/* 唤起APP */
		'CallApp' => 7,
		/* 服务号支付 */
		'Service' => 5,
		/* 掌上支付 */
		'GeneralMobile'  => 6,
		/* 代扣/签约 */
		'ReplaceDeduct'  => 8,
		/* 社区银行 */
		'CommunityBack'  => 9,
		/* ATM/CRS */
		'ATM/CRS'  => 10,
		/* 超级二维码 */
		'SQRcode'  => 99
	],
	/* 支付形式别名 */
    'PayModeAlias' => [
		/* 现金 */
		'现金'          => 11,
		/* 银行刷卡/芯片 */
		'银行刷卡/芯片' => 3,
		/* 主动扫码 */
		'主动扫码'      => 4,
		/* 被动扫码 */
		'被动扫码'      => 1,
		/* PC网关支付 */
		'PC网关支付'    => 2,
		/* Wap网关支付 */
		'Wap网关支付'   => 12,
		/* 唤起APP */
		'唤起APP'       => 7,
		/* 服务号支付 */
		'服务号支付'    => 5,
		/* 掌上支付 */
		'掌上支付'      => 6,
		/* 代扣/签约 */
		'代扣/签约'     => 8,
		/* 社区银行 */
		'社区银行'      => 9,
		/* ATM/CRS */
		'ATM/CRS'       => 10,
		/* 超级二维码 */
		'超级二维码'    => 99
	],
	/* 支付状态 */
    'PayStatus' => [
		/* 订单 */
		'Order'  => [
			/* 待支付 */
			'NonExecution'   => 1,
			/* 支付未完成 */
			'NonPaymentDone' => 2,
			/* 支付完成 */
			'PaymentDone'    => 3,
			/* 退款 */
			'Refund'         => 4,
			/* 失败 */
			'Fail'           => 5,
			/* 关闭 */
			'Close'          => 6
		],
		//订单状态别名
		'OrderAlias' => [
			'待支付' => 1,
			'未完成' => 2,
			'已完成' => 3,
			'退款'   => 4,
			'失败'   => 5,
			'关闭'   => 6,
		],
		/* 流水号 */
		'Serial' => [
			/* 待支付 */
			'NonExecution'   => 1,
			/* 支付中 */
			'PaymentIng'     => 2,
			/* 支付完成 */
			'PaymentDone'    => 3,
			/* 退款 */
			'Refund'         => 4,
			/* 失败 */
			'Fail'           => 5
		],
		//流水号状态别名
		'SerialAlias' => [
			'待支付' => 1,
			'支付中' => 2,
			'已完成' => 3,
			'退款'   => 4,
			'失败'   => 5,
		],
	],
	//对账状态
	'CheckStatus' => [
		//支付渠道对账状态
		'PaymentChannel' => [
			'未对账' => 1,
			'成功'   => 2,
			'失败'   => 3,
		],
		//受理渠道对账状态
		'AcceptChannel' => [
			'未对账' => 1,
			'成功'   => 2,
			'失败'   => 3,
		],
		//BOSS对账状态
		'BOSS' => [
			'未对账' => 1,
			'成功'   => 2,
			'失败'   => 3,
		]
	]
);

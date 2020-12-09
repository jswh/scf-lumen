# Tencent Cloud SCF Lumen API Service Starter Template

* use jwt token
* api service only

## Usage
1. clone this repo
2. install package: `compsoer install`
3. set lumen config: `cp .env.example .env`
4. change scf config: serverless.yml
5. deploy: `sls deploy`

## Q&A
- how to connet other servers of qcloud

[change `vpcConfig`](https://github.com/serverless-components/tencent-scf/blob/master/docs/configure.md#%E7%A7%81%E6%9C%89%E7%BD%91%E7%BB%9C) and set config in .env file as normal lumen project.
- how to add other url pattern

[change endpoints](https://github.com/serverless-components/tencent-scf/blob/master/docs/configure.md#apigw-%E8%A7%A6%E5%8F%91%E5%99%A8%E5%8F%82%E6%95%B0)

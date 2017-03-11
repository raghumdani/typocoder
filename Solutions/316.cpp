#include<bits/stdc++.h>
#define MOD 1000000007
using namespace std;
long long fact[105];
void precal()
{
	int i;
	fact[0]=1;
	fact[1]=1;
	for (i=2;i<=100;i++)
	{fact[i]=(fact[i-1]*i)%MOD;
	}
}
long long fastpow(long long base,long long exp)
{
	if(exp==0)
	return 1;
	if(exp==1)
	return base%MOD;
	int temp=fastpow(base,exp/2);
	if(exp%2)
	{
		return ((temp*temp)%MOD*base)%MOD;
	}
	else return (temp*temp)%MOD;
}
int findpow(long long p)
{
	if(p==1)
	return 0;
	else return 1+findpow(p/2);
}
long long mmi(long long t)
{
	return fastpow(t,MOD-2);
}
long long perm(int n,int r)
{
	long long t1=fact[n];
	long long t2=mmi(fact[n-r]);
	return (t1*t2)%MOD;
}
int main()
{	precal();
	int T;
	scanf("%d",&T);
	while(T--)
	{
	long long N,K;
	scanf("%lld%lld",&N,&K);
	int level=findpow(N+1);
	level=log(N+1)/log(2);
	
	if(level<K)
	{printf("0\n");
	}
	
	long long p=perm(level,K);
	long long t=fastpow(K,level-K);
	 printf("%lld\n",(p*t)%MOD);
	}
}
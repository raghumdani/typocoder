#include <iostream>
#include <cstdio>
#include <algorithm>
#include <cmath>
using namespace std;

long long int n,k,a[109][109],b[109][109],c[109][109],m1=1000000007,ans;

void multiply(long long int c[109][109],long long int d[109][109])
{
	long long int m[109][109],i,j,k1;
	for(i=0;i<=k;i++)
	{
		for(j=0;j<=k;j++)
		{
			m[i][j]=0;
			for(k1=0;k1<=k;k1++)
			{
				m[i][j]+=(((c[i][k1]%m1)*(d[k1][j]%m1))%m1);
			}
		}
	}
	for(i=0;i<=k;i++)
	{
		for(j=0;j<=k;j++)
		{
			c[i][j]=m[i][j];
		}
	}
	return ;
}


void power(long long int n)
{
	if(n==1)
		return ;
	power(n/2);
	multiply(a,a);
	if(n%2!=0)
		multiply(a,b);
	return ;
}



void multiply2(long long int c[109][109],long long int d[109][109])
{
	long long int m[109][109],i,j,k1;
	for(i=0;i<1;i++)
	{
		for(j=0;j<=k;j++)
		{
			m[i][j]=0;
			for(k1=0;k1<=k;k1++)
			{
				m[i][j]+=(((c[i][k1]%m1)*(d[k1][j]%m1))%m1);
			}
		}
	}
	for(i=0;i<1;i++)
	{
		for(j=0;j<=k;j++)
		{
			c[i][j]=m[i][j];
		}
	}
	ans=c[0][k];
	return ;
}

void comp()
{
	long long int i,j;
	for(i=0;i<=k;i++)
	{
		for(j=0;j<=k;j++)
		{
			if((j==i)||(j==i+1))
			{
				a[i][j]=1;
				b[i][j]=1;
			}
			else
			{
				a[i][j]=0;
				b[i][j]=0;
			}
		}
	}
	power(n);
	for(j=0;j<=k;j++)
		c[0][j]=0;
	c[0][0]=1;
	multiply2(c,a);
}


int main() {
	long long int t,i,j,c1,c2,c3,c4;
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%lld %lld",&n,&k);
		c1=n;
		c2=0;
		c3=n;
		c4=k;
		while(c1!=0)
		{
			c2++;
			c1=(c1>>1);
		}
		n=n-k+1;
		k=k-1;
		comp();
		if(c4>c2)
			ans=0;
		printf("%lld\n",ans);
	}
	return 0;
}
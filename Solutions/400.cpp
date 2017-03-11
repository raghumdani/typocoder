#include <bits/stdc++.h>
using namespace std;
int main() 
{
	long long int t,n,i,j,k,a,b,sum=1;
	scanf("%lld",&t);
	for(i=0;i<t;i++)
	{
	    sum =1;
	    scanf("%lld",&n);
	    k=n;
	    while(k!=0)
	    {
	        b=k%10;
	        k=k/10;
	        sum = sum * b;
	    }
	    printf("%lld\n",sum);
	}
	return 0;
}

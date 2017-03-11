#include <bits/stdc++.h>
using namespace std;
int main() 
{
	int t,n,i,j,k,a,b,sum=1;
	cin>>t;
	for(i=0;i<t;i++)
	{
	    sum =1;
	    cin>>n;
	    k=n;
	    while(k!=0)
	    {
	        b=k%10;
	        k=k/10;
	        sum = sum * b;
	    }
	    printf("%d\n",sum);
	}
	return 0;
}

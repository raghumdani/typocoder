#include <bits/stdc++.h>
using namespace std;
int main() 
{
	long int n,i,j,t,a[10000],s1=0,s2=0;
	scanf("%ld",&n);
	for(i=0;i<n;i++)
	{
	    scanf("%ld",&a[i]);
	   // s1 =s1 + a[i];
	    
	}
	j=0;
	for(i=n;i>0;i--)
	{
	    s1 = s1 + (a[j]*i);
	    j++;
	}
	sort(a,a+n);
	j=0;
	for(i=n;i>0;i--)
	{
	    s2 = s2 + (a[j]*i);
	    j++;
	}
	printf("%ld",s1-s2);
	return 0;
}

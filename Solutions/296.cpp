#include <stdio.h>

int main() {
    int t,i=1;
    scanf("%d",&t);
    int a[t];
    for(;i<=t;i++ )
    {
      int n,k,r=0;
      scanf("%d %d",&n,&k);
      int temp=n;
      while(temp != 0 && temp!=1  )
      {
        temp/=2;
        r++;
      }
      int j=3,fact=2;
      for(;j<=k;j++)
        fact*=j;
      for(j=1;j<r-k;j++)
        fact*=k;
        a[i-1]=fact%1000000007;
    }
    for(i=0;i<t;i++)
      printf("%d\n",a[i]);
	return(0);
}

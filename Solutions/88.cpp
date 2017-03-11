 #include <stdio.h> 

int main() { 
    int t;
    scanf("%d",&t);
    int i;int c=0,j;int n=0;
    for(i=0;i<t;i++)
    {
        c=0;
        scanf("%d",&n);
        for(j=2;j<n/2;j++)
        {
            if(n%j==0)c++;
        }
        if(c>0)
        printf("NO")
        else printf("YES");
    }
	return(0);
}